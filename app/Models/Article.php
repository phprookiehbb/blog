<?php

namespace App\Models;

use App\Http\Requests\ArticleRequest;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'article_tag','article_id','tag_id');
    }
    public function nav()
    {
        return $this->belongsTo(Nav::class,'category_id','id');
    }
    public function addArticle(ArticleRequest $request, Tag $tag)
    {
        $article = $this->getArgs($request);
        $tags = explode(',',$request->input('keywords'));
        if(!empty($tags))
        {
            $tag_all = $tag->addTags(collect($tags));
            $article->assignTags($tag_all);
        }
    }
    public function updateArticle(ArticleRequest $request, Tag $tag)
    {
        $tags = $this->tags()->pluck('tag');
        $article = $this->getArgs($request);
        $keywords = explode(',',$request->input('keywords'));



        $tagsAll = $tag->pluck('tag');
        //减少的tag减一
        $diffs =  $tags->diff(collect($keywords));
        if($diffs->isNotEmpty())
        {
            $del_tags = $tag->delTags($diffs);
            $article->delTags($del_tags);
        }
        //新增的
        $new_tags = collect($keywords)->diff($tagsAll);
        if($new_tags->isNotEmpty())
        {
            $tag_all = $tag->addTags($new_tags);
            $article->assignTags($tag_all);
        }

    }
    public function assignTags($tags)
    {
        $this->tags()->attach($tags);
    }
    public function delTags($tags)
    {
        $this->tags()->detach($tags);
    }

    public function getArgs($request)
    {
        $this->title = $request->input('title');
        $this->category_id = $request->input('category_id');
        $this->keywords = $request->input('keywords');
        $this->description = $request->input('description');
        $this->content = $request->input('editormd_id-html-code');
        $this->markdown = $request->input('markdown');
        $this->source = $request->input('source');
        $this->click = $request->input('click');
        $this->author = $request->input('author');
        $this->img = $this->getImg($request->input('img'), $request->input('markdown'));
        $this->type = !empty($request->input('type')) ? join(',',$request->input('type','')) : '';
        $this->save();
        return $this;
    }
    public function getImg($img, $markdown)
    {
        if(!$img)
        {
            $patten = '/\[?!\[.*\]\((.*)(\s.*)?\)\]?.*?/iU';
            if(preg_match($patten, $markdown, $matches))
            {
                return $matches[1];
            }
        }
        return $img;

    }
    public function getLabelsAttribute()
    {
        //t:推荐，r:热门，z：置顶，y：原创，c:转载，
        $labels = [
            't' => '推荐',
            'r' => '热门',
            'z' => '置顶',
            'y' => '原创',
            'c' => '转载'
        ];
        $type = $this->attributes['type'];
        $types = explode(',',$type);
        $labels = array_filter($labels,function($value, $key) use ($types){
            return in_array($key,$types);
        }, ARRAY_FILTER_USE_BOTH);
        return $labels;
    }
    /**
     * 开启状态
     * @return mixed
     */
    public function getArticleStatusAttribute()
    {
        $msg = ['已关闭','已开启'];
        return $msg[$this->attributes['status']];
    }
    public function getArticleImgAttribute()
    {
        $img = $this->attributes['img'];
        if(!$img)
        {
            $pic = ['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg','11.jpg','12.jpg','13.jpg'];
            shuffle($pic);
            $img = '/home/picture/'.array_shift($pic);
        }
        return $img;
    }
    public function getArticleAuthorAttribute()
    {
        $author = $this->attributes['author'];
        if(!$author)
        {
            return get_config('web_author');
        }
        return $author;
    }
    public function getTimeAttribute()
    {
        return time_format($this->attributes['created_at']);
    }
    public function getMonthTimeAttribute()
    {
        return date('m-d',strtotime($this->attributes['created_at']));
    }
    public function getInfoAttribute()
    {
        return strcut($this->attributes['description'], 30);
    }
}
