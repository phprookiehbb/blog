<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;

class Nav extends Models
{
    use NodeTrait;
    const MSG = ['已关闭','已开启'];
    //
    protected $guarded = [];

    public function articles()
    {
        return $this->hasMany(Article::class,'category_id','id');
    }

    /**
     * 开启状态
     * @return mixed
     */
    public function getNavStatusAttribute()
    {
        return self::MSG[$this->attributes['status']];
    }
    public function getCommentAttribute()
    {
        return self::MSG[$this->attributes['is_comment']];
    }
}
