<?php

namespace App\Http\Controllers\Admin;


use App\Article;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Bouncer;
use Silber\Bouncer\Database\Role;

class AbilityController extends Controller
{
    protected $actions;

    public function __construct()
    {
        $this->actions = [
            Article::class => Article::getActions(),
            User::class => User::getActions(),
            Role::class => [
                'read',
                'create',
                'update',
            ],
        ];
    }

    public function index()
    {
        return view('admin.abilities.index', [
            'roles' => Role::all(),
            'actions' => $this->actions,
        ]);
    }

    public function update(Request $request)
    {
        $changes = [];

        foreach (Role::all() as $role) {
            foreach ($this->actions as $model => $modelActions) {
                foreach ($modelActions as $modelAction) {
                    $modelName = $model !== 'global' ? $model : null;
                    if ($request->filled("abilities.$role->name.$model.$modelAction")) {
                        if ($role->cannot($modelAction, $modelName)) {
                            $changes[$role->name]['added'][$model][] = $modelAction;
                        }
                        Bouncer::allow($role->name)->to($modelAction, $modelName);
                    } else {
                        if ($role->can($modelAction, $modelName)) {
                            $changes[$role->name]['removed'][$model][] = $modelAction;
                        }
                        Bouncer::disallow($role->name)->to($modelAction, $modelName);
                    }
                }
            }
        }

        return redirect()->action('Admin\AbilityController@index');
    }
}