<?php

namespace App\Http\Controllers\Blog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Метод по умолчанию
    public function __invoke()
    {
        dd('index');
        // return redirect()->route('blog.post.index');
    }
}
