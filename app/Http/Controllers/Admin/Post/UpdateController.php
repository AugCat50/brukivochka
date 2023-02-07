<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\UpdateRequest;

class UpdateController extends Controller
{
    //Метод по умолчанию
    public function __invoke(UpdateRequest $request, Post $post)
    {
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

        $post->update($data);
        //Удалит в базе привязки к tags все, которых нет в $tagIds
        $post->tags()->sync($tagIds);
        
        return view('admin.post.show', compact('post'));
    }
}
