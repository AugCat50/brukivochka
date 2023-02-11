<?php

namespace App\Http\Controllers\Admin\User;

use App\Jobs\StoreUserJob;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;

class StoreController extends Controller
{
    //Метод по умолчанию
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        //Здесь можно ввести сервисы и работать через них, но в данном случае это не нужно

        StoreUserJob::dispatch($data);

        return redirect()->route('admin.user.index');
    }
}
