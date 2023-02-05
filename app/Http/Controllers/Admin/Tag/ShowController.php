<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    //Метод по умолчанию
    //Переменная должна называться так же как в роуте, чтобы laravel автоматически загружал модель по id
    public function __invoke(Tag $tag)
    {      
        return view('admin.tag.show', compact('tag'));
    }
}
