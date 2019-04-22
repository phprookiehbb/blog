<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/2
 * Time: 14:19
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Http\Services\CommentService;
use App\Models\Article;


class ArticleController
{
    public function index(Article $article)
    {
        $article->load('tags');
        $comments = CommentService::comment($article->type, $article->id);
        $type = $article->category_id;
        $article_id = $article->id;
        //浏览量加1
        $article->increment('click');
        return view('home.article._template_article',compact('article','comments','type','article_id'));
    }
}