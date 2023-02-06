<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    //Метод по умолчанию
    public function __invoke()
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }
}
