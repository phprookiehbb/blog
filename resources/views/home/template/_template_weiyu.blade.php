@extends('home.layout.base')
@section('title')
    吐槽 | {{ get_config('web_name') }}
@endsection
@section('meta')
    <meta name="author" content="{{ get_config('web_author') }}">
    <meta name="description" content="{{ get_config('web_description') }}">
    <meta name="keywords" content="{{ get_config('web_keywords') }}">
@endsection
@section('body')
    <body class="home blog post-template-default single single-post postid-1562 single-format-standard">
    @section('main-contant')
<style>
    .shuoshuo-list { list-style: none; background: none; } .shuoshuo-list>li { position: relative; /*overflow: hidden;*/ min-height: 50px; margin: 10px 0 35px; perspective: 5000px; } .shuoshuo-list>li>.avatar { width: 50px; height: 50px; display: block; border-radius: 100%; position: absolute; } .shuoshuo-content { float: left; padding-left: 65px; color: #fff; } .shuoshuo-content-inner { position: relative; padding: 10px; background: #fd6a7f; border-radius: 5px; } .shuoshuo-content-inner:before { content: ""; border-top: 25px solid transparent; border-right: 50px solid #fd6a7f; border-bottom: 25px solid transparent; position: absolute; left: -10px; top: 0; z-index: -1; } .shuoshuo-list li:nth-child(4n) .shuoshuo-content-inner:before { border-right: 50px solid #70c3ff; } .shuoshuo-list li:nth-child(4n) .shuoshuo-content-inner { background: #70c3ff; } .shuoshuo-list li:nth-child(4n-1) .shuoshuo-content-inner:before { border-right: 50px solid #7f8ea0; } .shuoshuo-list li:nth-child(4n-1) .shuoshuo-content-inner { background: #7f8ea0; } .shuoshuo-list li:nth-child(4n-2) .shuoshuo-content-inner:before { border-right: 50px solid #89d04f; } .shuoshuo-list li:nth-child(4n-2) .shuoshuo-content-inner { background: #89d04f; } .shuoshuo-list li, .shuoshuo-content-inner { -webkit-transition: all .8s cubic-bezier(.59,1.45,.69,.98) .2s; -moz-transition: all .8s cubic-bezier(.59,1.45,.69,.98) .2s; -o-transition: all .8s cubic-bezier(.59,1.45,.69,.98) .2s; -ms-transition: all .8s cubic-bezier(.59,1.45,.69,.98) .2s; transition: all .8s cubic-bezier(.59,1.45,.69,.98) .2s; -webkit-transform-origin: 0 0; -moz-transform-origin: 0 0; -o-transform-origin: 0 0; -ms-transform-origin: 0 0; transform-origin: 0 0; } .shuoshuo-list li:hover .shuoshuo-content-inner { -webkit-transform: rotateY(-5deg); -moz-transform: rotateY(-5deg); -o-transform: rotateY(-5deg); -ms-transform: rotateY(-5deg); transform: rotateY(-5deg); -webkit-transform-style: preserve-3d; -moz-transform-style: preserve-3d; -ms-transform-style: preserve-3d; -o-transform-style: preserve-3d; transform-style: preserve-3d; } .shuoshuo-list li:hover .shuoshuo-content-inner { box-shadow: 10px 0 10px -6px rgba(0,0,0,.3); } .shuoshuo-content p { line-height: 1.8; } .shuoshuo-content p a { color: #fff; border-bottom: 1px dashed #dedddd; margin: 0 3px; } .shuoshuo-content img { max-width: 100%; *:width: auto; /*低版本的IE*/ *:max-width: 100%; height: auto; } .shuoshuo-info { border-top: 2px dashed rgba(82, 82, 82, 0.38); margin-top: 7px; padding-top: 7px; } .shuoshuo-info, .shuoshuo-info a { font-size: 12px; color: #f7f7f7; } .shuoshuo-info span { margin-right: 5px; } .shuoshuo-link { position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: 10; cursor: pointer; border: none; }
</style>
<ul class="shuoshuo-list width-short clear-fix">
    @foreach($weiyus as $weiyu)
    <li class="clear-fix">
        <img alt="" class="no-error avatar avatar-50 photo" height="50" src="{{ get_master_img()->avatar }}" title="{$vo.username}" width="50"/>
        <div class="shuoshuo-content" style="cursor:pointer" data-id="{{ $weiyu->id }}" data-href="{{ route('article.zan') }}">
            <div class="shuoshuo-content-inner">
                {!! $weiyu->content !!}
                <div class="shuoshuo-info">
                            <span name="发表时间">
                                <i aria-hidden="true" class="fa fa-calendar">
                                </i>
                                {{ time_format($weiyu->created_at) }}({{ date('m-d',strtotime($weiyu->created_at)) }})
                            </span>
                    <span name="点赞数">
                                <i aria-hidden="true" class="fa fa-thumbs-up">
                                </i>
                                <span class="zan-num">{{ $weiyu->zan }}</span>
                            </span>
                </div>
            </div>
            <!-- .shuoshuo-content-inner -->
        </div>
        <!-- .shuoshuo-content -->
    </li>
    @endforeach
</ul>
<!-- .shuoshuo-list -->
<!-- 说说分页 -->
<div class="comment-navi">
    {{ $weiyus->links('home.layout.page') }}
</div>
@endsection
