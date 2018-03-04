<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinglePage;

class SinglePageController extends Controller
{
    public function show(SinglePage $singlePage)
    {

        return view('web.singlepage.single' ,
            [
                'singlePage' => $singlePage->where('published' , true)->first()
            ]);
    }
}
