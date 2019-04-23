@extends('home.layout.base')
@section('title')
    {{ get_config('web_name') }}
@endsection
@section('meta')
<meta name="author" content="{{ get_config('web_author') }}">
<meta name="description" content="{{ get_config('web_description') }}">
<meta name="keywords" content="{{ get_config('web_keywords') }}">
@endsection
@section('body')
<body class="home blog post-template-default single single-post postid-1562 single-format-standard">
@section('main-contant')
<main class="site-main" id="main" role="main">
    <!-- 博文列表区 -->
    <section class="clear-fix" id="post-lists">
        <!-- 列表头广告 -->
        @foreach($articles as $article)
            <article id="post-{$vo.id}">
                <div class="post-item-card">
                    <div class="post-item-card-body">
                        <a class="item-thumb" href="{{ route('article',['article' => $article->id]) }}">
                            <figure class="thumbnail" style="background-image:url({{ $article->article_img }});">
                            </figure>
                            <div class="archive-content">
                                {{ $article->info }}
                            </div>
                        </a>
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="{{ route('article',['article' => $article->id]) }}">
                                    {{ $article->title }}
                                </a>
                            </h2>
                            <span class="entry-meta">
                                    <i aria-hidden="true" class="fa fa-calendar">
                                    </i>
                                {{ $article->time }}&nbsp;({{ $article->month_time }})
                                    <i aria-hidden="true" class="fa fa-eye">
                                    </i>
                                {{ $article->click }}
                                <a href="{{ route('article',['article' => $article->id]) }}/#comments">
                                    <i aria-hidden="true" class="fa fa-comments">
                                    </i>
                                    {{ $article->comment }}
                                    </a>

                                </span>
                        </header>
                        <!-- .entry-header -->
                    </div>
                    <!-- #post-item-card-body -->
                </div>
                <!-- #post-item-card -->
            </article>
    @endforeach
        <!-- 列表尾广告 -->
    </section>
    <!-- .post-lists -->
    <!-- 页码 -->
    {{ $articles->links('home.layout.page') }}
</main>
@endsection
