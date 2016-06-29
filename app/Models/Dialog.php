<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    protected $table = "dialogs";
    protected $fillable = [
        'id', 'created_by', 'created_at', 'updated_at',
    ];
    protected $hidden = [];
}
