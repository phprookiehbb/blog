<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/1
 * Time: 16:17
 */

namespace App\Http\Services;


use App\Models\Comment;

class CommentService
{
    public static function comment($type, $article_id = '')
    {
        if(!$article_id)
        {
            $comments = Comment::with('user','replies')
                ->ofType($type)
                ->orderBy('floor','desc')
                ->paginate(get_config('web_paginate'));
        }else{
            $comments = Comment::with('user','replies')
                ->where('article_id',$article_id)
                ->orderBy('floor','desc')
                ->paginate(get_config('web_paginate'));
        }

        return $comments;
    }
}