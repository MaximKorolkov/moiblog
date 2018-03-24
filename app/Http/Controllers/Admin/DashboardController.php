<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\DashboardIndexRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Bouncer;
use Silber\Bouncer\Database\Role;

class DashboardController extends Controller
{
    // Метод для показа главной страницы Панели Администратора
    public function dashboard(DashboardIndexRequest $request)
    {
        $article = Article::find(1);

        $article->canUserActionWithOwn('delete', auth()->user());

        auth()->user()->can('create', $article);

        //Bouncer::sync(User::find(1))->roles(['admin']);

        return view('admin.dashboard');
    }
}
