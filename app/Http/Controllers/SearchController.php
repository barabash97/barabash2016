<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Article;

class SearchController extends Controller
{
    
    /* Per visualizzare il risultato della ricerca */
    
    public function result(Request $request){
        
        $query = htmlspecialchars($request->input('query_search'));
        if(count($query) == 0){
            return view('errors.404');
        }
        $articles = Article::where('title', 'LIKE', '%'.$query.'%')->get();
        
        return view('search.result', ['articles' => $articles]);
    }
}
