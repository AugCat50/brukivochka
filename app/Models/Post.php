<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    //(related, foreignKey, ownerKey)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Отношение многие ко многоим, посты к лайкам пользователей (related, table, foreignKey, localKey or ownerKey)
    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    //Отношение постов к комментариям, один ко многим (related, foreignKey, localKey)
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);
    }
}
