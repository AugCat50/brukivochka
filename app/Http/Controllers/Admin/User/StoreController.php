<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\StoreRequest;

class StoreController extends Controller
{
    //Метод по умолчанию
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        //Здесь можно ввести сервисы и работать через них, но в данном случае это не нужно

        $data['password'] = Hash::make($data['password']);
        
        //Возвращает модель
        //Рекомендуется прочесть документацию. Так же см. Бл.7
        User::firstOrCreate($data);

        return redirect()->route('admin.user.index');
    }
}
