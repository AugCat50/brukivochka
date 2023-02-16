<?php

namespace App\Http\Controllers\Blog\Comment;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;

class UpdateController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        
        return redirect()->route('personal.comment.index');
    }
}
