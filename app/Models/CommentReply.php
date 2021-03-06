<?php

namespace App\Models;

use App\Events\CommentCreated;
use App\Jobs\SendMail;

class CommentReply extends Models
{
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::created(function(CommentReply $commentReply){
            //评论事件触发
            \event(new CommentCreated($commentReply));
            if(get_config('mail_notice'))
            {
                SendMail::dispatch($commentReply);
            }
        });
    }

    protected $guarded = [];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->belongsTo(Comment::class)->orderBy('id','desc');
    }
    public function toUser()
    {
        return $this->belongsTo(User::class,'to_user_id', 'id');
    }
    public function reply()
    {
        return $this->belongsTo(CommentReply::class,'to_id','id');
    }
    public function getContentAttribute($value)
    {
        $search = explode(',', get_config('web_filter'));
        $content = str_replace($search,'***',$value);
        return $content;
    }
    public function getRealContentAttribute()
    {
        return $this->attributes['content'];
    }
}
