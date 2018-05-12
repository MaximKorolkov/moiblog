<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('web.users.profile', [
            'user' => $user
        ]);
    }

    public function edit()
    {
        return view('web.users.edit');
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = auth()->user();

            $user->fill($request->only(
                [
                    'name',
                    'email',
                    'password',
                    'city',
                    'about',
                    'published_email',
                    'social_vk',
                    'social_fb',
                    'social_twitter',
                    'social_instagram',
                    'social_google',
                    'social_telegram',
                    'site',
                ]
            ));


            $user->published_email = !empty($request->input('published_email'));

            $user->save();

            DB::commit();

            return redirect()->action('UserController@index');

        }catch (\Exception $exception)
        {
            DB::rollback();
        }
    }

    //TODO Rename method
    public function addSubscribe(User $user)
    {
        $followers = auth()->user()->followers->push($user);
        $subscribers = $user->subscribers->push(auth()->user());

        auth()->user()->followers()->sync($followers);
        $user->subscribers()->sync($subscribers);

        return redirect()->action('UserController@index', $user->id);
    }

    //TODO Rename method
    public function deleteSubscribe(User $user)
    {
        $followers = auth()->user()->followers()->where('id', '!=', $user->id)->pluck('id');
        $subscribers = $user->subscribers()->where('id', '!=', auth()->user()->id)->pluck('id');

        auth()->user()->followers()->sync($followers);
        $user->subscribers()->sync($subscribers);

        return redirect()->action('UserController@index', $user->id);
    }
}
