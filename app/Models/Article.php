<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "blog_articles";
    protected $fillable = [
        'id', 'id_blog', 'title', 'full_text', 'meta_key', 'meta_desc', 'path_image'
        ];
    protected $hidden = [];
}
