<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/2
 * Time: 15:37
 */

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Http\Services\CommentCreateService;
use App\Models\Article;
use App\Models\Nav;
use App\Models\Weiyu;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * 评论
     * @param Request $request
     */
    public function comment(Request $request)
    {
        
        $comment = (new CommentCreateService())->comment($request);
        return $comment;
    }
    public function zan(Request $request)
    {
        $type = $request->post('type');
        $id = $request->post('id');
        if($type == 2)
        {
            Article::where('id',$id)->increment('zan',1);
        }elseif($type == 1){
            Nav::where('id',$id)->increment('zan',1);
        }else{
            Weiyu::where('id',$id)->increment('zan',1);
        }
    }
}