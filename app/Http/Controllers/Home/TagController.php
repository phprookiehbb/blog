<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/9
 * Time: 14:53
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\Article;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $search = request()->get('tag');
        $articles = Article::where('title', 'like', '%'.$search.'%')
                           ->orWhere('content', 'like','%'.$search.'%')
                           ->paginate(12);
        return view('home.search._template_search',compact('articles','search'));
    }
    public function tags()
    {
        $tags = Tag::orderBy('times','desc')->get();
        return view('home.search._template_tag',['tags' => $tags]);
    }
    public function search(Tag $tag)
    {
        $articles = $tag->articles()->paginate(12);
        $search = $tag->tag;
        return view('home.search._template_search',compact('articles','search'));
    }

}