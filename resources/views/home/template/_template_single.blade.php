@extends('home.layout.base')
@section('title')
   {{ $nav->name }} |{{ get_config('web_name') }}
@endsection
@section('meta')
    <meta name="author" content="{{ get_config('web_author') }}">
    <meta property="og:type" content="article">
    <meta name="description" content="{{ get_config('web_description') }}">
    <meta name="keywords" content="{{ get_config('web_keywords') }}">
@endsection
@section('body')
    <body class="page-template page-template-template page-template-template-links page-template-templatetemplate-links-php page page-id-308">
    @section('main-contant')
<style>
    .entry-content { min-height: 200px; } .links-list { list-style: none; } .links-list>li { width: 33.33%!important; float: left!important; line-height: 20px!important; word-break: keep-all; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; } .links-list img { width: 20px; height: 20px; margin-right: 3px; -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none; border: none; } .links-list a.links { vertical-align: super; border: none!important; } @media screen and (max-width: 660px) { ul.links-list { padding-left: 14px; } .links-list>li { width: 50%!important; } }
</style>
<header class="banner-bg-header">
    <h1 class="banner-title">
        友情链接
    </h1>
    <h4 class="banner-sub-title">
        欢迎大家来交换友链
    </h4>
</header>
<article class="post-308 page type-page status-publish hentry" id="post-308" itemscope="" itemtype="http://schema.org/Article">
    <!-- 正文 -->
    <div class="entry-content" itemprop="articleBody">
        {!! $nav->content !!}
    </div>
    <!-- .entry-content -->
    <!-- 点赞、分享、打赏组件 -->
    <div class="social-main">
        <div class="like favorite" data-action="ding" data-id="{{ $nav->id }}" data-type="1" data-href="{{ route('article.zan') }}">
            <span class="likeHeart" rel="like" >
            </span>
            <span class="count">
                {{ $nav->zan }}
            </span>
            人点赞
        </div>
        @include('home.layout.reward')
    </div>
</article>
<!-- #post -->
<!-- 判断是否有评论 -->
@if($nav->is_comment == 1)
    <!-- #post -->
    @include('home.layout.comments')
    @endif
@endsection