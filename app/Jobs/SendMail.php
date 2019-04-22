<?php

namespace App\Jobs;

use App\Events\CommentCreated;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $comment;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Model $comment)
    {
        //
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $comment = $this->comment;
        if($comment instanceof Comment)
        {
            \event(new CommentCreated($comment));
        }elseif($comment instanceof CommentReply){
            \event(new CommentCreated($comment));
        }


    }
}
