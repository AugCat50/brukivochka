<?php

namespace App\Http\Controllers\Blog\Like;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Comment\StoreRequest;
use App\Models\Comment;

class StoreController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(Post $post)
    {
        //toggle Привязать/отвязать пост к пользователю. Отвязывает если привязан и наоборот
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->back();
    }
}
