<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use Storage;
class ProvaFileController extends Controller
{
    public function index(){
        return view('prova.file');
    }
    
    public function save(Request $request){
        $path = storage_path('article_images');
        $image = $request->file('image');
        $rules = ['image' => 'required|image|max:1024*1024*1'];
        
        $validator = Validator::make($request->all(), $rules);
        if(!$validator->fails()){
            $name = str_random(30) . '-'. $image->getClientOriginalName();
            $result = $image->move($path, $name);
             $file = Storage::get($path.'/'.$name);
        return response($file, 200)->header('Content-Type', 'image/jpeg');
        }
    }
}
