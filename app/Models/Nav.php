<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Nav extends Model
{
    use NodeTrait;
    const MSG = ['已关闭','已开启'];
    //
    protected $fillable = [
        'name','url','markdown','content','editormd_id-html-code','sort','parent_id','status','template','is_comment'
    ];

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
