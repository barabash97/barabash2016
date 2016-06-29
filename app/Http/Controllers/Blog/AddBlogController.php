<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Blog;
use Auth;
use Html;

class AddBlogController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $categories = BlogCategory::all();
        return view('blogs.addblog', ['categories' => $categories, 'meta' => $this->getMetaData()]);
    }

    /* Riceve i dati di tipo POST */

    protected function store(Request $request) {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $result = $this->create($request->all());
            if ($result) {
                return view('events.success', ['message' => trans('blogs.success_add_blog')]);
            }
        }
    }

    /* Regole di validator */

    public function getRules() {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'id_category' => 'required|Integer',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ];
    }

    public function getMetaData() {
        return [
            "title" => trans('blogs.header_title_new_blog'),
            "keywords" => "",
            "description" => ""
        ];
    }

    private function create(array $data) {
        $image = $data['image'];
        $extension = $image->getClientOriginalExtension();
        $name = md5(time());
        $filename = $name.'.'.$extension;
        $image->move('blog_images', $filename);
        return Blog::create([
                    'id_user' => Auth::user()->id,
                    'title' => htmlspecialchars($data['title']),
                    'description' => htmlspecialchars($data['description']),
                    'id_category' => htmlspecialchars($data['id_category']),
                    'path_image' => $filename
        ]);
    }

}
