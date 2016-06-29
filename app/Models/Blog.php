<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $table = "blogs";
    protected $fillable = [
        'id', 'id_user', 'id_category','title', 'description', 'path_image'
    ];
    protected $hidden = [];

}
