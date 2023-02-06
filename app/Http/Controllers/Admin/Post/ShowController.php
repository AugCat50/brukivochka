<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    //Метод по умолчанию
    //Переменная должна называться так же как в роуте, чтобы laravel автоматически загружал модель по id
    public function __invoke(Post $post)
    {      
        return view('admin.post.show', compact('post'));
    }
}
