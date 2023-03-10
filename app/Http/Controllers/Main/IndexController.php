<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Метод по умолчанию
    public function __invoke()
    {
        $categories = Category::all();

        return view('main.index', compact('categories'));
    }
}
