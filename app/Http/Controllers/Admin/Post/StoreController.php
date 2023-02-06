<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends Controller
{
    //Метод по умолчанию
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $previewImage = $data['preview_image'];
        $mainImage    = $data['main_image'];

        $previewImagePath = Storage::put('/images', $previewImage);
        $mainImagePath    = Storage::put('/images', $mainImage);

        //Специально сделаю это явно
        $data['preview_image'] = $previewImagePath;
        $data['main_image']    = $mainImagePath;

        //Здесь можно ввести сервисы и работать через них, но в данном случае это не нужно
        
        //Возвращает модель
        //Рекомендуется прочесть документацию. Так же см. Бл.7
        Post::firstOrCreate($data);

        return redirect()->route('admin.post.index');
    }
}
