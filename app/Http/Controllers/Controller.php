<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;
use App\User;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function getRules() {
        return [];
    }

    protected function validator(array $data) {
        return Validator::make($data, $this->getRules());
    }

    public static function getErrorPage($id = 404) {
        switch ($id) {
            case '404':
                return view('errors.404');
                break;
            case '503':
                return view('errors.503');
                break;
            default:
                return view('errors.404');
                break;
        }
    }

    public static function checkIdInteger($id = null) {
        if (ctype_digit($id) && $id != null && isset($id)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function checkExistUser($id = null) {
        $user = User::where('id', '=', $id)->first();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

}
