<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию.
    public function __invoke()
    {
        $userName = auth()->user()->name;
        return view('personal.main.index', compact('userName'));
    }
}
