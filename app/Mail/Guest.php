<?php

namespace App\Mail;

use App\Models\CommentReply;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Guest extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CommentReply $comment)
    {
        //
        $type = 1;
        if($comment->to_id != 0)
        {
            $type = 2;
        }
        $this->type = $type;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('home.mail.guest')
                     ->subject('您有新的评论回复啦！');
    }
}