<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/* Database dov'è ad ogni dialogo sono associati utenti*/
class DialogUser extends Model
{
    protected $table = "dialog_users";
    protected $fillable = [
        'id', 'user_id', 'dialog_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [];
}
