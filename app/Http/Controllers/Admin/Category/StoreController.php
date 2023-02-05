<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;

class StoreController extends Controller
{
    //Метод по умолчанию
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        //Здесь можно ввести сервисы и работать через них, но в данном случае это не нужно
        
        //Возвращает модель
        //Рекомендуется прочесть документацию. Так же см. Бл.7
        Category::firstOrCreate($data);

        return redirect()->route('admin.category.index');
    }
}
