<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    public function show(Request $request, Category $category)
    {

        return view('web.category' , [
            'categories' => $category,
            'articles'   => $category->articles()->where('published' , true)->orderBy('created_at' , 'desc')->get(),
        ] );

    }
}
