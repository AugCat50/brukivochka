<?php

namespace App\Http\Controllers\Blog\Comment;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию.
    public function __invoke()
    {
        $comments = auth()->user()->comments;
        return view('personal.comment.index', compact('comments'));
    }
}
