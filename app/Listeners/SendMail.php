<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use App\Mail\Guest;
use App\Mail\Owner;
use App\Models\CommentReply;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CommentCreated $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {
        //
        $comment = $event->comment;

        try{
            //当是二级回复的时候才会通知相应的回复的用户
            if($comment instanceof CommentReply)
            {
                //判断是否开启了邮件通知
                if($comment->to_id == 0)
                {
                    if($comment->comment->remind == 1)
                    {
                        Mail::to($comment->user->email)->queue(new Guest($comment));
                    }
                }else{
                    if($comment->reply->remind == 1)
                    {
                        Mail::to($comment->reply->user->email)->queue(new Guest($comment));
                    }
                }

            }
            //所有的都通知owner
            Mail::to('646054215@qq.com')->queue(new Owner($comment));
        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }
}
