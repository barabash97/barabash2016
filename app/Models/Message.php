<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $table = "messages";
    protected $fillable = [
        'id', 'sender_id', 'dialog_id', 'text', 'read', 'created_at', 'updated_at'
    ];
    protected $hidden = [];

}
