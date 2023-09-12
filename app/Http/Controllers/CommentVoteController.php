<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentVoteController extends Controller
{
    public function upvote(Comment $comment)
    {
        $comment->upvote();
        return back();
    }

    public function downvote(Comment $comment)
    {
        $comment->downvote();
        return back();
    }
}
