<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class DashboardController extends Controller
{
    // Метод для показа главной страницы Панели Администратора
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
