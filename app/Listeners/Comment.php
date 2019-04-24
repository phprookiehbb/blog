<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use App\Models\CommentReply;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Comment
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
     * @param  CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {
        $event->comment->user()->increment('comments');
        //以及评论
        if($event->comment instanceof \App\Models\Comment)
        {
            $event->comment->article()->increment('comment');
        }elseif($event->comment instanceof CommentReply)  //二级评论
        {
            $event->comment->comment->article()->increment('comment');
        }

    }
}
