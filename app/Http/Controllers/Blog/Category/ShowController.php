<?php

namespace App\Http\Controllers\Blog\Category;

use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    //Метод по умолчанию
    public function __invoke()
    {
        dd('show');
        return redirect()->route('blog.post.index');
    }
}
