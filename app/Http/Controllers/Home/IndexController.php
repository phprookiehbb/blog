<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    public function  index( Request $request)
    {
        $articles = (new ArticleService())->list();
        return view('home.index.index',compact('articles'));
    }
}