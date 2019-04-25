@extends('home.layout.base')
@section('title')
    404 您访问的界面不存在 | {{ get_config('web_name') }}
@endsection
@section('meta')
    <meta name="author" content="{{ get_config('web_author') }}">
    <meta name="description" content="{{ get_config('web_description') }}">
    <meta name="keywords" content="{{ get_config('web_keywords') }}">
@endsection
@section('body')
    <body class="home blog post-template-default single single-post postid-1562 single-format-standard">
    @section('main-contant')

<style type="text/css">
    #svgContainer { max-width: 800px; min-height: 100px; margin: 10px auto 30px; } #svgContainer > svg { border-radius: 5px; } #btn-back-home { background-image: -webkit-gradient(linear,left top,right top,from(#fda233),to(#fd8320)); background-image: -webkit-linear-gradient(left,#fda233,#fd8320); background-image: linear-gradient(to right,#fda233,#fd8320); FILTER: progid:DXImageTransform.Microsoft.Gradient(gradientType=1, startColorStr=#fda233, endColorStr=#fd8320); width: 160px; height: 46px; line-height: 46px; border: 0; border-radius: 46px; cursor: pointer; display: block; vertical-align: middle; text-align: center; color: #fff; margin: 5px auto 30px; font-size: 14px; } #btn-back-home:hover { -webkit-box-shadow: 0 2px 8px 0 rgba(0,0,0,.15); box-shadow: 0 2px 8px 0 rgba(0,0,0,.15); -webkit-transition: all .2s; transition: all .2s; opacity: .9; } #btn-back-home .fa { font-size: 20px; }
</style>
<div id="svgContainer"></div>
<a id="btn-back-home" href="{{ route('home.index') }}"> <i class="fa fa-home" aria-hidden="true"></i> 返回首页 </a>
@endsection
    @section('script')
<script type="text/javascript" src="/home/js/bodymovin.js"></script>
<script type="text/javascript" src="/home/js/data.js"></script>
<script type="text/javascript">
    var svgContainer = document.getElementById('svgContainer');
    var animItem = bodymovin.loadAnimation({
        wrapper: svgContainer,
        animType: 'svg',
        loop: true,
        animationData: JSON.parse(animationData)
    });
</script>
@endsection