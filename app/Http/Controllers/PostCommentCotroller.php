<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentCotroller extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'body' => request('body'),
            'commentable_type' => 'App\Models\Post',
            'commentable_id' => $post->id
        ]);

        return back();
    }
}
