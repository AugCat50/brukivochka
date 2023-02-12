<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию.
    public function __invoke()
    {
        //likedPosts() - со скобками запрос в базу. Без скобок - получение коллекции
        $posts = auth()->user()->likedPosts;

        return view('personal.liked.index', compact('posts'));
    }
}
