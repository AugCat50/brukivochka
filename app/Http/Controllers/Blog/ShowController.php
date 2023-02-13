<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ShowController extends Controller
{
    //Метод по умолчанию
    public function __invoke(Post $post)
    {
        $pageTitle = $post->title;
        $date      = Carbon::parse($post->created_at);

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);

        $carbonInstance = new Carbon();

        return view('blog.show', compact('post', 'pageTitle', 'date', 'relatedPosts', 'carbonInstance'));
    }
}
