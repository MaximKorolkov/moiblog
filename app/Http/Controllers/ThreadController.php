<?php

namespace App\Http\Controllers;

use App\Http\Requests\Web\ThreadIndexRequest;
use App\Http\Requests\Web\ThreadShowRequest;
use App\Thread;
use App\User;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index(ThreadIndexRequest $request, User $user)
    {
        return view('web.thread.index', [
            'user' => $user
        ]);
    }

    public function create(Request $request, User $user)
    {
        $currentThread = auth()->user()->threads()->whereHas('users', function($query) use ($user) {
            $query->where('thread_users.user_id', $user->id);
        })->first();

        if (!empty($currentThread)) {
            return redirect()->action('ThreadController@show', $currentThread->id);
        }

        $thread = new Thread();

        $thread->save();

        $thread->users()->sync([$user->id, auth()->user()->id]);

        return redirect()->action('ThreadController@show', $thread->id);
    }

    public function show(ThreadShowRequest $request, Thread $thread)
    {
        return view('web.thread.show', [
            'thread' => $thread
        ]);
    }
}