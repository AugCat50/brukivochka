<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    //Метод по умолчанию
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
}
