<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'posts';
    
    //Аналог fillable, просто отключает защиту на запись всех полей
    protected $guarded = false;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    // Отношение постов к категориям. Позволяет получать модель категории из коллекции (модели) постов
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Отношение многие ко многоим, посты к лайкам пользователей
    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }
}
