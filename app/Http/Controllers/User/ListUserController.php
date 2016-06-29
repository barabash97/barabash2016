<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\User;

class ListUserController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        $users = User::paginate(12);
        return view('users.list', ['users' => $users]);
    }
}
