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
        try {
            $data   = $request->validated();
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
    
            $previewImage = $data['preview_image'];
            $mainImage    = $data['main_image'];
    
            $previewImagePath = Storage::disk('public')->put('/images', $previewImage);
            $mainImagePath    = Storage::disk('public')->put('/images', $mainImage);
    
            //Специально сделаю это явно
            $data['preview_image'] = $previewImagePath;
            $data['main_image']    = $mainImagePath;
    
            //Здесь можно ввести сервисы и работать через них, но в данном случае это не нужно
            
            //Возвращает модель
            //Рекомендуется прочесть документацию. Так же см. Бл.7
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
    
            return redirect()->route('admin.post.index');
        } catch (\Exception $exception) {
            abort(404);
        }
    }
}
