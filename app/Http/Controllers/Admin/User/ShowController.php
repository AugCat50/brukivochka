<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    //Метод по умолчанию
    //Переменная должна называться так же как в роуте, чтобы laravel автоматически загружал модель по id
    public function __invoke(User $user)
    {      
        return view('admin.user.show', compact('user'));
    }
}
