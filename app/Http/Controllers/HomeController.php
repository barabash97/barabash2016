<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use DB;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\User;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $articles = DB::table('blog_articles')->orderBy('id', 'desc')->paginate(4);
        $blogs = Blog::all();
        $categories = BlogCategory::all();
        $users = User::all();
        return view('articles._list_articles', [
            'articles' => $articles,
            'categories' => $categories,
            'users' => $users,
            'blogs' => $blogs
        ]);
    }

}
