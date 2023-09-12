<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store()
    {
        request()->validate([
            'body' => 'required'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'body' => 'body'
        ]);


    }
}
