<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Blog;
use Validator;
use App\User;
use Auth;
class EditArticleBlogController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($id) {
        $article = Article::where('id', '=', $id)->first();
        return view('articles.edit_article', ['article' => $article]);
    }

    public function store($id = null, Request $request) {
        $validator = $this->validator($request->all(), $this->getRules());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $result = $this->edit($request->all(), $id);
            if ($result) {
                return view('events.success', ['message' => trans('articles.success_edit_article')]);
            }
        }
    }

    public function viewEditImage($id = null) {
        return view('articles.edit_image');
    }

    public function editImage($id = null, Request $request) {
        $article = Article::where('id', '=', $id)->first();
        $blog = Blog::where('id', '=', $article->id_blog)->first();
        $rules = ['image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if ($this->checkIdInteger($id) && $this->checkExistUser($id) && $blog->id_user == Auth::user()->id) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $name = md5(time());
                $filename = $name . '.' . $extension;
                $image->move('article_images', $filename);
                Article::where('id', '=', $id)->update([
                    'path_image' => $filename
                ]);
                header('Location: /index.php');
                exit;
            }
        }
    }

    private function edit(array $data, $id) {

        return Article::find($id)->update([
                    'title' => htmlspecialchars($data['title']),
                    'full_text' => $data['full_text'],
                    'meta_key' => htmlspecialchars($data['meta_key']),
                    'meta_desc' => htmlspecialchars($data['meta_desc']),
        ]);
    }

    public function getRules() {
        return [
            'title' => 'required|max:255',
            'full_text' => 'required',
        ];
    }

}
