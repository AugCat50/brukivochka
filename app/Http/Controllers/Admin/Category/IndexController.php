<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Метод по умолчанию
    public function __invoke()
    {
        return view('admin.categories.index');
    }
}
