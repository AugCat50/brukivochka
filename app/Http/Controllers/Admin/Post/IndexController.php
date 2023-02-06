<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию
    public function __invoke()
    {
        $posts = Post::all();
        
        return view('admin.post.index', compact('posts'));
    }
}
