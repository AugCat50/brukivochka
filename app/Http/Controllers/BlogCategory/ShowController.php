<?php

namespace App\Http\Controllers\BlogCategory;

use App\Models\Category;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    //Метод по умолчанию
    public function __invoke(Category $category)
    {
        $categories    = Category::all();
        $posts         = $category->posts;
        $categoryTitle = $category->title;
        return view('category.show', compact('posts', 'categoryTitle', 'categories'));
    }
}
