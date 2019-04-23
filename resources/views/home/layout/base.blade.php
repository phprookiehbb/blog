<!doctype html>
<html lang="zh-CN">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="webkit" name="renderer">
    <meta name="baidu-site-verification" content="282sReZUOW" />
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="no-transform" http-equiv="Cache-Control">
    <meta content="no-siteapp" http-equiv="Cache-Control">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('meta')
    <link href="/favicon.ico" type="image/ico" rel="shortcut icon">
    <!--[if lt IE 9]> <script src="/home/js/html5-css3.js"></script> <![endif]-->
    <link href="/home/css/font-awesome.min.css?t=<?php echo time();?>" id="font-awesome-css" media="all" rel="stylesheet" type="text/css"/>
    <link href="/home/css/jquery.fancybox.min.css" id="fancybox-css" media="all" rel="stylesheet" type="text/css"/>
    <link href="/home/css/style.css?t=<?php echo time();?>" id="main-style-css" media="all" rel="stylesheet" type="text/css"/>
    <script src="/home/js/jquery.min.js" type="text/javascript"></script>
    <script src="/home/js/jquery.fancybox.min.js" type="text/javascript"></script>
    <script src="/home/js/prettify.js" type="text/javascript"></script>
    <script src="/home/js/script.min.js" type="text/javascript"></script>
    <script src="/layui/layui.js"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
    <script src="/home/js/letterAvatar.js"></script>
    <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" id="main-style-css" media="all" rel="stylesheet" type="text/css"/>
    <script type="text/javascript">
        var hbb_api = {"ajax_url":"","home_url":"","theme_url":""}; /* ]]> */
        (function(){var bp = document.createElement('script');bp.src = '//push.zhanzhang.baidu.com/push.js';var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(bp, s);})();var _hmt = _hmt || [];
        // (function() {var hm = document.createElement("script");hm.src = "https://hm.baidu.com/hm.js?e9822f97c76e715b4b90b28f3c5ca415";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(hm, s);})();
        {!! get_config('site_statistics') !!}
    </script>
    <style>
        ::-moz-selection{background-color:#ff9800!important;}::selection{background-color:#ff9800!important;}.code-pretty-container .code-type, button, .btn, fieldset > legend {background-color: #ff9800;}@media screen and (max-width: 750px) {#top-navi .main-menu .current-menu-item>a, #top-navi .main-menu .current-menu-item>a:hover {background-color: #ff9800!important;}}.mk-checkbox input[type="checkbox"]:checked + div {background-color: #e6e6e6!important;border: 1px solid #ff9800!important;box-shadow: inset 0 0 0 10px #ff9800!important;}.mk-checkbox input[type="checkbox"]:checked + div > div {box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 0 1px #ff9800!important;}.links:hover, .entry-content a:not([class~="btn"]):not([data-fancybox]):hover, .comment-content-text a:not([class~="btn"]):not([data-fancybox]):hover {color: #ff9800;border-bottom: 1px solid #ff9800;}.comment-reply-title span {border-left: 4px solid #ff9800;}#top-navi .main-menu ul li:hover>a, .top-navi-search-btn:hover, #top-navi .main-menu ul li a:hover, .article-ontop, .entry-content h2:before, .comment-at, .page-navi li.current a, .comment-navi .page-numbers.current, .article-navi span {color: #ff9800!important;}#nprogress .bar{background: #ff9800}#nprogress .peg {  box-shadow: 0 0 10px #ff9800, 0 0 5px #ff9800;}#nprogress .spinner-icon{border-top-color: #ff9800;border-left-color: #ff9800;}
    </style>
</head>
@yield('body')
@include('home.layout.header')
<!-- #top-header -->
@yield('main-contant')
<!-- .site-main -->
@include('home.layout.footer')
<!-- 返回顶部按钮 -->
<div class="headroom" id="scroll-to-top" title="返回顶部">
    <i aria-hidden="true" class="fa fa-chevron-up">
    </i>
</div>
<!-- 初始化小表情、灯箱、代码高亮 -->
<script>
    initTheme();
</script>
@yield('script')
</body>
</html>