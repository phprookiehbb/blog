<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Nav;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $navs = Nav::get()->toFlatTree();
        $articles = Article::with('nav')->orderBy('id','desc')->paginate(10);
        return view('admin.article.index',compact('articles','navs'));
    }
    public function create()
    {
        $navs = Nav::get()->toFlatTree();
        return view('admin.article.create',compact('navs'));
    }
    public function store(ArticleRequest $request, Article $article, Tag $tag)
    {
        $article->addArticle($request, $tag);
        return $this->success('添加成功',route('article.index'));
    }
    public function edit(Article $article)
    {
        $navs = Nav::get()->toFlatTree();
        return view('admin.article.edit',compact('article','navs'));
    }
    public function update(ArticleRequest $request, Article $article, Tag $tag)
    {
        $article->updateArticle($request, $tag);
        return $this->success('修改成功',route('article.index'));
    }
    public function destroy(Article $article)
    {
        $article->tags()->decrement('times');
        //减少相应tags的数目
        $article->tags()->detach();
        $article->delete();
        return redirect()->back();
    }
    public function upload(Request $request)
    {
        $path = $request->file('file')->store('article');
        return json_encode(['code' => 0,'result' => '/storage/'. $path]);
    }
}
