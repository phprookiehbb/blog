<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/1
 * Time: 17:46
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\CommentService;
use App\Models\User;

class ReadwallController extends Controller
{
    public function index()
    {
        $nav = get_nav();
        $comments = CommentService::comment($nav->id);
        $users = User::orderBy('fen','desc')->get();
        $type = $nav->id;
        $article_id = 0;
        return view('home.template._template_readwall',compact('nav','comments','users','type','article_id'));
    }
}