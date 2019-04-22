<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\ArticleService;
use App\Models\Nav;


class CategoryController extends Controller
{
    public function  index()
    {
        $nav = get_nav();
        $articles = (new ArticleService())->list($nav->id);
        $type = $nav->id;
        $article_id = 0;
        return view('home.template.'.$nav['template'],compact('articles','nav','type','article_id'));
    }
}