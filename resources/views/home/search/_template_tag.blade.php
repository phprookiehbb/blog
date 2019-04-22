@extends('home.layout.base')
@section('title')
    CraspHB彬的博客 | 一个php爱好者
@endsection
@section('meta')
    <meta name="author" content="{{ $sys_config['web_author'] }}">
    <meta name="description" content="{{ $sys_config['web_description'] }}">
    <meta name="keywords" content="{{ $sys_config['web_keywords'] }}">
@endsection
@section('body')
    <body class="home blog post-template-default single single-post postid-1562 single-format-standard">
    @section('main-contant')
    <style>
        .search-form { margin: 28px auto; } /* 搜索标签区域 */ .search-tags { padding: 15px; margin-bottom: 10px; } .search-tags label { display: inline-block; margin: 0 5px 10px 0; font-size: 13px; } .search-tags .fa { color: #b3b2b2; } .search-tags .links { border: none; margin-left: 2px; }
    </style>
    <header class="banner-bg-header">
        <h1 class="banner-title">
            搜索
        </h1>
        <h4 class="banner-sub-title">
            找一找你想要的内容
        </h4>
    </header>
    <section class="width-short">
        <!-- 搜索框 -->
        <div class="search-form">
            <form action="{{ route('search.index') }}" class="mk-side-form" id="search" method="get" onsubmit="return Search('wp');" role="search">
                {{ csrf_field() }}
                <input autocomplete="off" id="wp_search" maxlength="30" name="tag" placeholder="Search..." required="true" title="你想找什么？" type="text">
                <button type="submit">
                    找找看
                </button>
                </input>
            </form>
        </div>
        <!-- 常用标签 -->
        <fieldset class="search-tags">
            <legend>
                常用标签
            </legend>
            @foreach($tags as $tag)
            <label>
                <i aria-hidden="true" class="fa fa-tag">
                </i>
                <a class="links" href="{{ route('search',['tag' => $tag->id]) }}">
                    {{ $tag->tag }}({{ $tag->times }})
                </a>
            </label>
            @endforeach
        </fieldset>
    </section>
@endsection