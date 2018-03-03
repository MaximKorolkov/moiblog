<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function show(Menu $menu)
    {
        return view('web.topmenu' ,
            [
                'menu' => $menu
            ]);

    }
}
