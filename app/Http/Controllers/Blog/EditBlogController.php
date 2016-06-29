<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Auth;
use Validator;

class EditBlogController extends Controller {

    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index($id = null) {
       
        $blog = Blog::where('id', '=', $id)->first();
        $categories = BlogCategory::all();
        return view('blogs.edit_blog', ['blog' => $blog, 'categories' => $categories]);
    }

    public function store($id, Request $request) {
        $validator = $this->validator($request->all(), $this->getRules());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $result = $this->edit($request->all(), $id);
            if ($result) {
                return view('events.success', ['message' => trans('blogs.success_edit_blog')]);
            }
        }
    }
    
     public function viewEditImage($id = null) {
        return view('blogs.edit_image');
    }

    public function editImage($id = null, Request $request) {
        $blog = Blog::where('id', '=', $id)->first();
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
                $image->move('blog_images', $filename);
                Blog::where('id', '=', $id)->update([
                    'path_image' => $filename
                ]);
                header('Location: /index.php');
                exit;
            }
        }
    }
    
    public function getRules() {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'id_category' => 'required'
        ];
    }

    private function edit(array $data, $id_param) { 
        $id = htmlspecialchars($id_param);
        return Blog::find($id)->update([
                    'id_user' => Auth::user()->id,
                    'title' => htmlspecialchars($data['title']),
                    'description' => htmlspecialchars($data['description']),
                    'id_category' => htmlspecialchars($data['id_category'])
        ]);
    }
    
    

}
