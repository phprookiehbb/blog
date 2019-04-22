@extends('home.layout.base')
@section('title')
    文章归档 | {{ $sys_config['web_name'] }}
@endsection
@section('meta')
    <meta name="author" content="{{ $sys_config['web_author'] }}">
    <meta property="og:type" content="article">
    <meta name="description" content="{{ $sys_config['web_description'] }}">
    <meta name="keywords" content="{{ $sys_config['web_keywords'] }}">
@endsection
@section('body')
    <body class="home blog post-template-default single single-post postid-1562 single-format-standard">
    @section('main-contant')
<!-- #top-header -->
<style type="text/css">
    .entry-content { margin-top: 20px; } /* 博客统计信息 */ .archives-count { width: 100%; text-align: center; color: #666; font-size: 14px; } .archives-count th, .archives-count td { /*border: 1px solid #ececec;*/ border: none; padding: 5px 0 8px; cursor: pointer; } @media screen and (min-width: 650px) { .archives-count td { width: 20%; } } .archives-count span { margin: 0 auto 5px; display: block; font-size: 20px; color: #adabab; } /* 归档列表 */ #all-post-archives { margin-bottom: 25px; } #all-post-archives ul { list-style: none; overflow: hidden; padding-left: 18px; } /* 年份标题 */ #all-post-archives .year { cursor: pointer; margin-bottom: 5px; } /* 每个月的文章内容 */ #all-post-archives .mon-list>li { margin-bottom: 12px; } /* 月份标题 */ #all-post-archives .mon { cursor: pointer; } /* 每个单独的一条 */ #all-post-archives .post-list>li { color: #c1c1c1; word-break: keep-all; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; } #all-post-archives .post-list>li>a { margin-left: 5px; border: none!important; }
</style>
<header class="banner-bg-header">
    <h1 class="banner-title">
        文章归档
    </h1>
    <h4 class="banner-sub-title">
        最后更新于 {{ $last_time }}
    </h4>
</header>
<section class="entry-content width-short" itemprop="articleBody">
    <fieldset>
        <legend>
            统计信息
        </legend>
        <table class="archives-count">
            <tr>
                <td>
                    <span>
                        {{ $tag_count }}+
                    </span>
                    标签
                </td>
                <td>
                    <span>
                        {{ $article_count }}+
                    </span>
                    文章
                </td>
                <td>
                    <span>
                        {{ $read_count }}+
                    </span>
                    阅读
                </td>
                <td>
                    <span>
                        {{ $comment_count }}+
                    </span>
                    留言
                </td>
                <td>
                    <span>
                        {{ $zan_count }}+
                    </span>
                    赞
                </td>
            </tr>
        </table>
    </fieldset>
    <div id="all-post-archives">
        @foreach($archives as $archive)
        <h2 class="year">
            {{ $archive['year'] }}年
        </h2>
        @if(!empty($archive['child']))
        <ul class="mon-list">
            @foreach($archive['child'] as $child)
            <span class="mon" style="display:block;height:25px;line-height:25px;">
                {{ $child['month'] }}月
           </span>
                @if(!empty($child['child']))
            <li>
                <ul class="post-list">
                    @foreach($child['child'] as $chil)
                    <li>
                        {{ $chil['day'] }}日:
                        <a class="links" href="{{ route('article',['article' => $chil['article']['id']]) }}">
                            {{ $chil['article']['title'] }}
                        </a>
                    </li>
                    @endforeach

                </ul>
            </li>
            @endif
            @endforeach
        </ul>
        @endif
        @endforeach
    </div>
@endsection
@section('script')
        <script>
            jQuery(document).ready(function($) {
                if($("#all-post-archives").hasClass("done")) return;
                $('#all-post-archives span.mon').each(function() {
                    var num = $(this).next('li').find('.post-list').children('li').size();
                    var text = $(this).text();
                    $(this).html(text + ' ( ' + num + ' 篇文章 )'); });
                $(document).unbind().on("click", "#all-post-archives span.mon, #all-post-archives h2.year", function() {
                    $(this).next().slideToggle(400);
                    return false;
                });
                $("#all-post-archives .mon-list").hide();
                $("#all-post-archives .mon-list:first").show();
                $("#all-post-archives").addClass("done");
            });
        </script>
@endsection
<!-- .entry-content -->