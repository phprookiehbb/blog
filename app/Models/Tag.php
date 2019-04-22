<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag','times'];
    //
    public function articles()
    {
        return $this->belongsToMany(Article::class,'article_tag');
    }
    public function addTags($tags)
    {
        return $tags->map(function($tag){
            $get_tag = self::where('tag', $tag)->first();
            if(!$get_tag)
            {
                $tag_new = self::create([
                    'tag' => $tag,
                    'times' => 1
                ]);
                return $tag_new->id;
            }
            $get_tag->increment('times');
            return $get_tag->id;
        })->toArray();
    }
    public function delTags($tags)
    {
        return $tags->map(function($tag){
            $get_tag = self::where('tag', $tag)->first();
            if($get_tag)
            {
                $get_tag->decrement('times');
                return $get_tag->id;
            }
        })->toArray();
    }
}
