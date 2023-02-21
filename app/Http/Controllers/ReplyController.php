<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReplyController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Comment $comment): RedirectResponse
    {
        $request->validate([
            'reply' => 'required|string|min:3|max:255',
        ]);

        $reply = new Reply();
        $reply->content = $request->input('reply');
        $reply->user_id = auth()->id();
        $reply->comment_id = $comment->id;
        $reply->save();

        return back();

    }

}
