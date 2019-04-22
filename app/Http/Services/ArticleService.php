<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/29
 * Time: 11:48
 */

namespace App\Http\Services;


use App\Models\Article;

class ArticleService
{
    public function list($category_id = '')
    {
        //文章列表
        if($category_id)
        {
            $articles = Article::where('category_id',$category_id)
                ->where('status',1)
                ->orderBy('id','desc')
                ->paginate(get_config('web_paginate'));
        }else{
            $articles = Article::where('status',1)
                ->orderBy('id','desc')
                ->paginate(get_config('web_paginate'));
        }
        return $articles;
    }
}