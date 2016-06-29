<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Article;
use App\Models\BlogCategory;
use App\User;
use DB;

class ViewBlogController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($id = null) {
        if ($this->checkIdInteger($id) && $this->checkExistBlog($id)) {
            $blog = Blog::where('id', '=', $id)->first(); //Blog info
            $blogs = Blog::all();
            $categories = BlogCategory::all();
            $users = User::all();
            $articles = Article::where('id_blog', '=', $id)->orderBy('id', 'desc')->paginate(6);
            return view('blogs.dashboard', [
                'blog' => $blog,
                'articles' => $articles,
                'categories' => $categories,
                'users' => $users, 
                'blogs' => $blogs
            ]);
        } else {
            return $this->getErrorPage(404);
        }
    }

    private function checkExistBlog($id = null) {
        $blog = Blog::where('id', '=', $id)->first();
        if ($blog) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserBlogs($id = null) {
        if ($this->checkIdInteger($id)) {
            $blogs = Blog::where('id_user', '=', $id)->orderBy('id', 'desc')->paginate(6); //Blog info
            return view('blogs.user_blogs', ['blogs' => $blogs]);
        } else {
            return $this->getErrorPage(404);
        }
    }

    public function viewAllBlogs() {
        $blogs = DB::table('blogs')->orderBy('id', 'desc')->paginate(6);
        return view('blogs.all_blogs', ['blogs' => $blogs]);
    }

    //
}
