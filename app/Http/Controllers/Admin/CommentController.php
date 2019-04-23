<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/15
 * Time: 9:25
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user','nav')
            ->orderBy('status','asc')
            ->orderBy('id','desc')
            ->paginate(20);

        return view('admin.comment.index',compact('comments'));
    }
    public function second()
    {
        $comments = CommentReply::with('comment','user')
            ->orderBy('status','asc')
            ->orderBy('id','desc')
            ->paginate(20);
        return view('admin.comment.second',compact('comments'));
    }
    public function delete(Comment $comment)
    {
        $comment->delete();
        $comment->replies()->delete();
        return redirect()->back();
    }
    public function deleteReply(CommentReply $reply)
    {
        $reply->delete();
        return redirect()->back();
    }
    public function check()
    {
        $id = request()->post('id');
        $type = request()->post('type');
        $status = request()->post('status');
        if($type == 1)
        {
            $comment = Comment::where('id',$id)->first();
        }else{
            $comment = CommentReply::where('id',$id)->first();
        }
        $comment->status = $status;
        $comment->save();
        return $this->success('审核成功');
    }

}