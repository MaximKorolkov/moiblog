<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UsersIndexRequest;
use App\Http\Requests\Admin\Users\UsersCreateRequest;
use App\Http\Requests\Admin\Users\UsersDestroyRequest;
use App\Http\Requests\Admin\Users\UsersEditRequest;
use App\Http\Requests\Admin\Users\UsersStoreRequest;
use App\Http\Requests\Admin\Users\UsersUpdateRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use Bouncer;
use Silber\Bouncer\Database\Role;

class UserController extends Controller
{
    public function index(UsersIndexRequest $request)
    {
        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }

    public function create(UsersCreateRequest $request)
    {
        return view('admin.users.create', [
            'roles' => Role::all(),
        ]);
    }

    public function store(UsersStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

            Bouncer::sync($user)->roles([$request->input('role')]);

            DB::commit();

            return redirect()->action('Admin\UserController@index');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function edit(UsersEditRequest $request, User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(UsersUpdateRequest $request, User $user)
    {
        DB::beginTransaction();

        try {

            $user->fill($request->only([
                'name',
                'email',
            ]));

            if ($request->has('password')) {
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();

            Bouncer::sync($user)->roles([$request->input('role')]);

            DB::commit();

            return redirect()->action('Admin\UserController@index');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function destroy(UsersDestroyRequest $request, User $user)
    {
        $user->delete();

        return redirect()->action('Admin\UserController@index');
    }
}