<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;

class StoreController extends Controller
{
    //Метод по умолчанию
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        //Здесь можно ввести сервисы и работать через них, но в данном случае это не нужно


        Mail::to($data['email'])->send(new PasswordMail($password));

        //Событие регистрации пользователя, аргумент - модель. Отправляет письмо с верификацией почты.
        event(new Registered($user));

        return redirect()->route('admin.user.index');
    }
}
