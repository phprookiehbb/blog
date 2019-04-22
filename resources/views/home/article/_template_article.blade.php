@extends('home.layout.base')
@section('title')
    {{ $article->title }} | {{ $sys_config['web_name'] }}
@endsection
@section('meta')
    <meta name="author" content="{{ $sys_config['web_author'] }}">
    <meta property="og:type" content="article">
    <meta property="article:published_time" content="{{ $article->created_at }}">
    <meta property="article:author" content="{{ $sys_config['web_author'] }},{{ $sys_config['web_name'] }}">
    <meta property="article:published_first" content="{{ $sys_config['web_name'] }}">
    <meta property="og:title" content="{{ $article->title }} | {{ $sys_config['web_name'] }}">
    <meta name="description" content="{{ $article->description }}">
    <meta property="og:description" content="{{ $article->description }}">
    <meta name="keywords" content="{{ $article->keywords }}">
    <meta property="og:keywords" content="{{ $article->keywords }}">
@endsection
@section('body')
    <body class="home blog post-template-default single single-post postid-1562 single-format-standard">
    @section('main-contant')
<style type="text/css">
    .zhuan{
        display:inline-block;
        width:20px;
        height:20px;
        line-height: 20px;
        background: #ff9800 ;
        border-radius: 3px;
        font-size:12px;
        color:#fff;
        text-align:center;
    }
</style>
<article class="post-1562 post type-post status-publish format-standard hentry category-other tag-4" id="post-1562" itemscope="" itemtype="http://schema.org/Article">
    <header class="entry-header">
        <h1 class="entry-title">
            {{ $article->title }}
        </h1>
        <div class="header-info">
            @if(strstr($article->type,'c') !== false)
            <span class="article-auth">
                <!-- 文章类型 -->
                <!-- 文章作者 -->
                <a href="javascript:void(0)" rel="nofollow" target="_blank">
                    <span class="zhuan">转</span>
                </a>
            </span>
            @endif
            <span class="article-auth">
                <!-- 文章类型 -->
                <!-- 文章作者 -->
                @if(strstr($article->type,'c') !== false)
                <a href="{{ $article->source }}" rel="nofollow" target="_blank">
                @else
                <a href="javascript:void(0)" rel="nofollow" target="_blank">
                @endif
                    <i aria-hidden="true" class="fa fa-user">
                    </i>
                    {{ $article->article_author }}
                </a>
            </span>
            <!-- 日期、阅读量、评论、编辑 -->
            <span class="article-date">
                <i aria-hidden="true" class="fa fa-clock-o">
                </i>
                <time datetime="{{ $article->created_at }}" itemprop="datePublished">
                    {{ $article->created_at }}
                </time>
            </span>
            <span class="article-views">
                <i aria-hidden="true" class="fa fa-eye">
                </i>
                {{ $article->click }}
            </span>
            <span class="article-comment">
                <a href="#comments">
                <i aria-hidden="true" class="fa fa-comments">
                </i>
                    {{ $article->comment }}
                </a>
            </span>
            <span class="article-edit" data-no-instant="">
            </span>
        </div>
    </header>
    <!-- .entry-header -->
    <!-- 文章摘要 -->
    <!-- 正文 -->
    <div class="entry-content" itemprop="articleBody">
        <div class="single-content">
            <!-- 文章内容 -->
            {!! $article->content !!}
        </div>
        <div class="content-extras clear-fix">
            <!-- 版权信息 -->
            <p class="single-copyright">

                @if(strstr($article->type,'c') !== false)
                注：本文转载于 <a href="{{ $article->source }}">{{ $article->source }}</a> ，如有维权，请联系博主删除
                @else
                {!! str_replace('{url}',route('article',['article'=>$article->id]),$sys_config['web_article_copyright']) !!}
                @endif
            </p>
            <!-- 文章标签 -->
            <p class="single-tags">
                <i aria-hidden="true" class="fa fa-tag">
                </i>
                @foreach($article->tags as $tag)
                <a href="{{ route('search',['tag' => $tag->id]) }}" rel="tag">
                    {{ $tag->tag }}
                </a>
                @endforeach
            </p>
        </div>
        <!-- content-extras -->
    </div>
    <!-- .entry-content -->
    <!-- 点赞、分享、打赏组件 -->
    <div class="social-main">
        <div class="like favorite" data-action="ding" data-id="{{ $article->id }}" data-type="2" data-href="{{ route('article.zan') }}">
            <span class="likeHeart" rel="like" >
            </span>
            <span class="count">
                {{ $article->zan }}
            </span>
            人点赞
        </div>
        @include('home.layout.reward')
    </div>
</article>
<!-- #post -->
@include('home.layout.comments')
<!-- .comments-area -->
<div class="" id="article-share" style="display: block;opacity: 1">
    分享
    <div class="share-item" data-site="weixin" title="分享到微信">
        <i class="fa fa-weixin">
        </i>
        微信
    </div>
    <div class="share-item" data-site="weibo" title="分享到新浪微博">
        <i class="fa fa-weibo">
        </i>
        微博
    </div>
    <div class="share-item" data-site="qq" title="分享给QQ好友">
        <i class="fa fa-qq">
        </i>
        QQ
    </div>
</div>
<div data-automenu="" id="article-menu">
</div>
@endsection