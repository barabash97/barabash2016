<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model {

    protected $table = "subscribers";
    protected $fillable = [
        'id', 'email', 'created_at', 'updated_at',
    ];
    protected $hidden = [];

}
