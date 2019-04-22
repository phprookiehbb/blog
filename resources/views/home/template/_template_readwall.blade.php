@extends('home.layout.base')
@section('title')
    读者墙 | {{ $sys_config['web_name'] }}
@endsection
@section('meta')
    <meta name="author" content="{{ $sys_config['web_author'] }}">
    <meta property="og:type" content="article">
    <meta name="description" content="{{ $sys_config['web_description'] }}">
    <meta name="keywords" content="{{ $sys_config['web_keywords'] }},读者墙">
@endsection
@section('body')
    <body class="home blog post-template-default single single-post postid-1562 single-format-standard">
    @section('main-contant')
<main class="site-main" id="main" role="main">
    <header class="banner-bg-header">
        <h1 class="banner-title">
            读者墙
        </h1>
        <h4 class="banner-sub-title">
            这里的人个个都是人才，说话又好听
        </h4>
    </header>
    <section class="width-short">
        <!-- 搜索框 -->
        <div class="readwall">
            <div class="readwall-top">
                @foreach($users as $key => $user)
                <div class="readwall-top-{{ $key+1 }}">
                    @if($key <= 2)
                        @if($user->url)
                        <a href="{{ $user->url }}" target="_blank">
                        @else
                        <a href="javascript:void(0)">
                        @endif
                            <h4>
                                @switch($key)
                                @case(0)【金牌读者】
                                @break
                                @case(1)【银牌读者】
                                @break
                                @default 【铜牌读者】
                                @endswitch
                                <small>【{{ $user->comments }}】条评论</small>
                            </h4>
                            <img alt="{{ $user->name }}" class="no-error avatar avatar-50 photo" height="50" onerror="onerror=null;src='/home/picture/a7852ba1aac74d32917caaebda5dda2e.gif'"  src="{{ $user->avatar }}" width="50"/>
                            <div class="readwall-top-username">
                                <span>{{ $user->name }}</span>
                                <span>LV{{ (get_level($user->fen))['level'] }}，{{ $user->fen }}积分</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    @endif
                </div>
                @endforeach
            </div>
            <div class="readwall-bot">
                @foreach($users as $key => $user)
                    @if($key > 2)
                        @if($user->url)
                            <a href="{{ $user->url }}" target="_blank">
                                @else
                                    <a href="javascript:void(0)">
                                        @endif
                        <img alt="{{ $user->name }}" class="no-error avatar avatar-50 photo" height="50" onerror="onerror=null;src='/home/picture/a7852ba1aac74d32917caaebda5dda2e.gif'"  src="{{ $user->avatar }}" width="50"/>
                        <span>{{ $user->name }}</span>
                    </a>
                    @endif
                @endforeach
            </div>
        </div>

    </section>
    <!-- #post -->
    <!-- 判断是否有评论 -->
    @if($nav->is_comment == 1)
        <!-- #post -->
            @include('home.layout.comments')
        @endif
</main>
@endsection