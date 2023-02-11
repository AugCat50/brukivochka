<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию
    public function __invoke()
    {
        $data = [];
        $data['usersCount']      = User::all()    ->count();
        $data['postsCount']      = Post::all()    ->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['tagsCount']       = Tag::all()     ->count();
        return view('admin.main.index', compact('data'));
    }
}
