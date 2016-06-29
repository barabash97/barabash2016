<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\User;
use Auth;
use App\Models\Article;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class CommentArticleController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function saveComment($id_param = null, Request $request) {
        $id = htmlspecialchars($id_param);
        if (!$this->checkIdInteger($id)) {
            return 0;
            exit;
        }
        if (!Article::where('id', '=', $id)->first()) {
            return 0;
            exit;
        }
        if (!count($request->text_comment) > 0) {
            return 0;
            exit;
        }
        $result = Comment::insert([
                    'id_article' => $id,
                    'id_user' => Auth::user()->id,
                    'text_comment' => htmlspecialchars($request->text_comment)
        ]);

        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getComments($id_param = null, Request $request){
       	$id = htmlspecialchars($id_param);
        if (!$this->checkIdInteger($id)) {
            return 0;
            exit;
        }
        if (!Article::where('id', '=', $id)->first()) {
            return 0;
            exit;
        }
        $users = User::all();
        $comments = Comment::where('id_article', '=', $id)->get();
        $users_list_assoc = array();
        foreach($users as $user){
            $users_list_assoc[$user->id] = $user; 
        }
        for($i = 0; $i < count($comments); $i++){
            if(isset($comments[$i]["id_user"])){
                $comments[$i]["firstname"] = $users_list_assoc[$comments[$i]["id_user"]]['firstname'];
                $comments[$i]["lastname"] = $users_list_assoc[$comments[$i]["id_user"]]['lastname'];
                $comments[$i]["path_image"] = $users_list_assoc[$comments[$i]["id_user"]]['path_image'];
            }
        }
        
         foreach ($comments as $comment) {
            $date = Carbon::parse($comment->created_at);
            $comment->timestamp = $date->timestamp;
        }
        return response()->json($comments);
    }

}
