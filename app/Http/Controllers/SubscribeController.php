<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Subscribe;
use Validator;

class SubscribeController extends Controller {

    public function save(Request $request) {
        $email = $request->input('email');
        
        $rules = [
            'email' => 'required|email'
        ];
        
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return view('errors.404');
        } else {
            $result = Subscribe::create([
                        'email' => $email,
            ]);
            if ($result) {
                return view('events.success', ['message' => "L'iscrizione è stata registrata con il successo!"]);
            } else {
                return view('events.success', ['message' => "Ci sono problemi con il database. Riprovare più tardi!"]);
            }
        }
    }

}
