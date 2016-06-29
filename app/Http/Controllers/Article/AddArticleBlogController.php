<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;


class AddArticleBlogController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('articles.add_article');
    }

    public function store($id, Request $request) {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $result = $this->create($id, $request->all());
            if($result){
                return view('events.success', ['message' => trans('articles.success_add_article')]);
            } else {
                return view('events.notice', ['message' => trans('articles.error_add_article_to_db')]);
            }
        }
    }

    public function create($id_blog, array $data) {
        $image = $data['image'];
        $extension = $image->getClientOriginalExtension();
        $name = md5(time());
        $filename = $name.'.'.$extension;
        $image->move('article_images', $filename);
        return Article::create([
                    'id_blog' => htmlspecialchars($id_blog),
                    'title' => htmlspecialchars($data['title']),
                    'meta_desc' => htmlspecialchars($data['meta_desc']),
                    'meta_key' => htmlspecialchars($data['meta_key']),
                    'full_text' => $data['full_text'], 
                    'path_image' => $filename
        ]);
    }

    public function getRules() {
        return [
            'title' => 'required|max:255',
            'full_text' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:20000'
        ];
    }

}
