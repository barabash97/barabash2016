<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Blog;
use App\Models\Comment;
use App\User;
use App\Models\BlogCategory;
use Auth;

class ViewArticleController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($id = null) {
        $blog = Blog::where('id_user', '=', Auth::user()->id)->first();
        if ($this->checkIdInteger($id)) {
            $article = Article::where('id', '=', $id)->first();
            $article_blog = Blog::where('id', '=', $article->id_blog)->first();
            $categories = BlogCategory::all();
            $users = User::all();
            return view('articles.single', [
                'article' => $article, 'blog' => $blog,
                'categories' => $categories,
                'users' => $users, 
                'article_blog' => $article_blog
            ]);
        } else {
            return view('errors.404');
        }
    }

    public function delete($id_param = null) {
        $id = htmlspecialchars($id_param);
        if ($this->checkIdInteger($id)) {
            $article = Article::where('id', '=', $id)->first();
            $count_comments = Comment::where('id_article', '=', $id)->count();
            $blog = Blog::where('id', '=', $article->id_blog)->first();
            if ($blog->id_user == Auth::user()->id) {
                if ($count_comments > 0) {
                    Comment::where('id_article', '=', $id)->delete();
                }
                $result = Article::where('id', '=', $id)->delete();
                if ($result) {
                    header('Location: /blog/' . $blog->id);
                    exit;
                } else {
                    return view('errors.404');
                }
            }
        } else {
            return view('errors.404');
        }
    }

}
