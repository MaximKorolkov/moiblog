<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\RolesCreateRequest;
use App\Http\Requests\Admin\Roles\RolesDestroyRequest;
use App\Http\Requests\Admin\Roles\RolesEditRequest;
use App\Http\Requests\Admin\Roles\RolesIndexRequest;
use App\Http\Requests\Admin\Roles\RolesStoreRequest;
use App\Http\Requests\Admin\Roles\RolesUpdateRequest;
use Illuminate\Support\Facades\DB;
use Silber\Bouncer\Database\Role;

class RoleController extends Controller
{
    public function index(RolesIndexRequest $request)
    {
        return view('admin.roles.index', [
            'roles' => Role::all(),
        ]);
    }

    public function create(RolesCreateRequest $request)
    {
        return view('admin.roles.create');
    }

    public function store(RolesStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $role = new Role($request->only([
                'name',
                'title',
            ]));

            $role->save();

            DB::commit();

            return redirect()->action('Admin\RoleController@index');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function edit(RolesEditRequest $request, Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
        ]);
    }

    public function update(RolesUpdateRequest $request, Role $role)
    {
        DB::beginTransaction();

        try {
            $role->fill($request->only([
                'name',
                'title',
            ]));

            $role->save();

            DB::commit();

            return redirect()->action('Admin\RoleController@index');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function destroy(RolesDestroyRequest $request, Role $role)
    {
        $role->delete();

        return redirect()->action('Admin\RoleController@index');
    }
}