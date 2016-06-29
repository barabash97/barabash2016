<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model {

    protected $table = "blog_categories";
    protected $fillable = [
        'id', 'title', 'description', 'id_root',
    ];
    protected $hidden = [];

}
