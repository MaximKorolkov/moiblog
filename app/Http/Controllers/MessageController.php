<?php

namespace App\Http\Controllers;


use App\Message;
use App\Thread;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(Request $request, Thread $thread)
    {
        $message = new Message(['text' => $request->input('text')]);
        $message->thread_id = $thread->id;
        $message->user_id = auth()->user()->id;

        $message->save();

        return redirect()->action('ThreadController@show', $thread->id);
    }
}