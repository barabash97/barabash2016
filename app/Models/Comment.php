<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "article_comments";
    protected $fillable = [
        'id', 'id_user', 'id_category','title', 'description',
    ];
    protected $hidden = [];
}
