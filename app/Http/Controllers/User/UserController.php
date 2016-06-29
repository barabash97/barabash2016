<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use Validator;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($id = null) {
        if ($this->checkIdInteger($id) && $this->checkExistUser($id)) {
            $user = User::where('id', '=', $id)->first();
            return view('users.dashboard', ['user' => $user]);
        } else {
            return view('errors.404');
        }
    }



    public function editGravatar($id = null, Request $request) {
        $rules = ['image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if ($this->checkIdInteger($id) && $this->checkExistUser($id) && $id == Auth::user()->id) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $name = Auth::user()->id;
                $filename = $name . '.' . $extension;
                $image->move('user_images', $filename);
                User::where('id', '=', $id)->update([
                    'path_image' => $filename
                ]);
                header('Location: /index.php');
                exit;
            }
        }
    }

    public function viewEditGravatar($id = null) {
        if ($this->checkIdInteger($id) && $this->checkExistUser($id) && $id == Auth::user()->id) {
            return view('users.edit_gravatar');
        } else {
            return view('errors.404');
        }
    }

}
