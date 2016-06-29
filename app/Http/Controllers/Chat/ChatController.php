<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use Auth;
use App\User;
use App\Models\Dialog;
use App\Models\DialogUser;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChatController extends Controller {

    private $id_dialog;
    private $id_from;
    private $id_to;

    public function __construct($to = null) {
        $this->middleware('auth');
    }

    public function index($id = null) {
        //Inizializzazione delle variabili 
        $this->id_from = Auth::user()->id;
        $this->id_to = $id;
        $user_to = User::where('id', '=', $id)->first();

        //Controllo 
        $users = ['1' => $user_to, '2' => Auth::user()];

        if ($id == Auth::user()->id || !$user_to) {
            return redirect('/');
        }

        if (!$this->id_dialog = $this->checkDialog($this->id_from, $this->id_to)) {
            $this->createDialog($this->id_to);
        }


        $messages = Message::where('dialog_id', '=', $this->id_dialog)->get();


        return view('chats.view', ['messages' => $messages, 'users' => $users, 'id_dialog' => $this->id_dialog]);
    }

    public function sendMessage($id = null, Request $request) { //ok, tutto funziona
        $result = Message::create([
                    'sender_id' => Auth::user()->id,
                    'text' => htmlspecialchars($request->text_message),
                    'dialog_id' => htmlspecialchars($request->id_dialog)
        ]);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    public function receiveMessage($id = null, Request $request) {

        $messages = Message::where('dialog_id', '=', $request->id_dialog)->get();

        foreach ($messages as $message) {
            $date = Carbon::parse($message->created_at);
            $message->timestamp = $date->timestamp;
        }

        return response()->json($messages);
    }

    /* Lista Dialoghi */

    public function viewDialogs() {
        $user_dialogs = DialogUser::where('user_id', '=', Auth::user()->id)->get();
        $users = User::all();
        $dialogs = DialogUser::all();
        return view('chats.dialogs', [
            'user_dialogs' => $user_dialogs,
            'users' => $users,
            'dialogs' => $dialogs
        ]);
    }

    private function checkDialog($from = null, $to = null) {
        $user_dialogs = DB::select('SELECT `dialog_id` FROM `dialog_users` WHERE `user_id` = ?', [$from]); // Dialogs of user 
        $array_dialogs = [];
        foreach ($user_dialogs as $dialog) {
            $array_dialogs[] = $dialog->dialog_id;
        }
        if (!count($array_dialogs) > 0) {
            return false;
        }
        $str = '';
        for ($i = 0; $i < count($array_dialogs); $i++) {
            $str .= $array_dialogs[$i] . ',';
        }
        $str = substr($str, 0, -1); //Es. 1,2,5,4
        $dialog = DB::select("SELECT `dialog_id` FROM `dialog_users` WHERE dialog_id IN(" . $str . ") AND user_id = ?", [$to]);
        if (isset($dialog[0]->dialog_id)) {
            $id = $dialog[0]->dialog_id;
            return $id;
        } else {
            return false;
        }
    }

    private function createDialog($to = null) {
        $result = DB::transaction(function() {
                    $id_new_dialog = Dialog::create([
                                'created_by' => Auth::user()->id
                    ]);
                    $this->id_dialog = $id_new_dialog->id;
                    DialogUser::create(
                            [
                                'user_id' => $this->id_from,
                                'dialog_id' => $this->id_dialog
                            ]
                    );

                    DialogUser::create([
                        'user_id' => $this->id_to,
                        'dialog_id' => $this->id_dialog
                    ]);
                });

        print_r($result);
    }

}
