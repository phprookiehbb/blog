<?php

namespace App\Models;

use App\Jobs\SendMail;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::created(function(Comment $comment){
            SendMail::dispatch($comment);
        });
    }

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    public function nav()
    {
        return $this->belongsTo(Nav::class, 'type', 'id');
    }
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
