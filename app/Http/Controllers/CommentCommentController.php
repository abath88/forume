<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentCommentController extends Controller
{
    public function store(Comment $comment)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $newcomment = Comment::create([
            'user_id' => auth()->id(),
            'body' => request('body'),
            'commentable_type' => 'App\Models\Comment',
            'commentable_id' => $comment->id
        ]);

        return back();
    }
}
