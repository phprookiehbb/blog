<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\MailSetService;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Config;
use App\Models\Tag;
use App\Models\Weiyu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
        //文章总数
        $articlesCount = Article::count();
        $readsCount = Article::sum('click');
        $commentsCount = Article::sum('comment');
        $zansCount = Article::sum('zan');
        $tagsCount = Tag::count();
        //文章取前10个
        $articles = Article::orderBy('id','desc')->take(10)->get();
        $weiyus = Weiyu::orderBy('id','desc')->take(10)->get();
        $comments = Comment::orderBy('id','desc')->take(10)->get();
        $assign = compact('articlesCount','readsCount','commentsCount','zansCount','tagsCount','articles','weiyus','comments');

        return view('admin.index.index',$assign);
    }
}
