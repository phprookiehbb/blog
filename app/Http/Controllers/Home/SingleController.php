<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\CommentService;


class SingleController extends Controller
{
    public function  index()
    {
        $nav = get_nav();
        $comments = CommentService::comment($nav->id);
        $type = $nav->id;
        $article_id = 0;
        return view('home.template._template_single',compact('nav','comments','type','article_id'));
    }

}