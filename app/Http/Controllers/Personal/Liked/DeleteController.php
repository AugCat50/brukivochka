<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Models\Post;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(Post $post)
    {
        //likedPosts() - со скобками запрос в базу. Без скобок - получение коллекции
        auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('personal.liked.index');
    }
}
