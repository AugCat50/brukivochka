<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table   = 'posts';
    
    //Аналог fillable, просто отключает защиту на запись всех полей
    protected $guarded = false;
}
