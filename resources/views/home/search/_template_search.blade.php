@extends('home.layout.base')
@section('title')
    {{ $search }} | CraspHB彬的博客
@endsection
@section('meta')
    <meta name="author" content="{{ $sys_config['web_description'] }}">
    <meta property="og:type" content="article">
    <meta name="description" content="{{ $sys_config['web_description'] }}">
    <meta name="keywords" content="{{ $sys_config['web_keywords'] }},{{ $search }}">
@endsection
@section('body')
    <body class="home blog post-template-default single single-post postid-1562 single-format-standard">
    @section('main-contant')
        <main class="site-main" id="main" role="main">
            <header class="banner-bg-header">
                <h1 class="banner-title">
                    搜索
                </h1>
                <h4 class="banner-sub-title">
                    找到 {{ $articles->total() }}+ 与『{{ $search }}』相关的内容
                </h4>
            </header>
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
                @if(empty($articles->total()))
                    <style> .notfound { margin: 50px auto 100px; padding: 30px; text-align: center; background: rgba(255, 255, 255, 0.56); max-width: 500px; border-radius: 10px; } .notfound-ooops { color: #666; font-size: 24px; margin-bottom: 25px; } .notfound-face { font-size: 40px; } </style>
                    <section class="notfound"> <p class="notfound-ooops">Ooops...该分类下还没有内容 <span class="notfound-face">：(</span></p> <p> 您可以尝试<a href="" class="links">查看其它分类</a> 或<a href="{{ route('home.index') }}" class="links">返回首页</a> </p> </section>
                @endif
            </section>
            <!-- .post-lists -->
            <!-- 页码 -->
            {{ $articles->links('home.layout.page') }}
        </main>
@endsection