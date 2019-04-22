<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/29
 * Time: 14:20
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Tag;

class ArchiveController extends Controller
{
    public function index()
    {
        $article = Article::where('status',1)
                 ->select(['title','id','created_at'])
                 ->orderBy('id','desc')
                 ->get()
                 ->toArray();
        $archives = [];
        $year = 0;
        $month = 0;
        $day = 0;
        //先找年
        foreach($article as $k => $vo){
            $year_tmp = date('Y',strtotime($vo['created_at']));
            if($year_tmp != $year){
                $archives[]['year'] = $year_tmp;
                $year = $year_tmp;
            }
        }
        //找出月
        foreach($archives as $k => $v){
            foreach($article as $ko => $vo){
                $month_tmp = date('m',strtotime($vo['created_at']));
                $year_tmp = date('Y',strtotime($vo['created_at']));
                if($year_tmp == $v['year']){
                    if($month_tmp != $month){
                        $archives[$k]['child'][]['month'] = $month_tmp;
                        $month = $month_tmp;
                    }

                }
            }
        }
        //halt($archive);
        //找出每天
        foreach($archives as $k => $v){
            foreach($v['child'] as $k2 => $v2){
                foreach($article as $ko => $vo){
                    $day_tmp = date('d',strtotime($vo['created_at']));
                    $month_tmp = date('m',strtotime($vo['created_at']));
                    $year_tmp = date('Y',strtotime($vo['created_at']));
                    if($year_tmp == $v['year']){
                        if($month_tmp == $v2['month']){
                            $archives[$k]['child'][$k2]['child'][$ko]['day'] = $day_tmp;
                            $archives[$k]['child'][$k2]['child'][$ko]['article'] = $vo;
                            $day = $day_tmp;
                        }
                    }
                }
            }
        }
        $last_time = Article::orderBy('created_at','desc')->first()->value('created_at');
        $zan_count = Article::sum('zan');
        $article_count = Article::count();
        $read_count = Article::sum('click');
        $tag_count = Tag::count();
        $comment_count = Comment::count() + CommentReply::count();
        return view('home.template._template_achive',compact('archives','zan_count','article_count','read_count','tag_count','comment_count','last_time'));
    }
}