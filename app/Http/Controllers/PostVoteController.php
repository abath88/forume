<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostVoteController extends Controller
{
    public function upvote(Post $post)
    {
        $post->upvote();
        return back();
    }

    public function downvote(Post $post)
    {
        $post->downvote();
        return back();
    }
}
