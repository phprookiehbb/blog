@extends('admin.layout.base')
@section('main-content')
    <div class="content">
        <style type="text/css">
            .sm-st {
                background:#fff;
                padding:20px;
                -webkit-border-radius:3px;
                -moz-border-radius:3px;
                border-radius:3px;
                margin-bottom:20px;
                -webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
                box-shadow: 0 1px 0px rgba(0,0,0,0.05);
            }
            .sm-st-icon {
                width:60px;
                height:60px;
                display:inline-block;
                line-height:60px;
                text-align:center;
                font-size:30px;
                background:#eee;
                -webkit-border-radius:5px;
                -moz-border-radius:5px;
                border-radius:5px;
                float:left;
                margin-right:10px;
                color:#fff;
            }
            .sm-st-info {
                font-size:12px;
                padding-top:2px;
            }
            .sm-st-info span {
                display:block;
                font-size:24px;
                font-weight:600;
            }
            .orange {
                background:#fa8564 !important;
            }
            .tar {
                background:#45cf95 !important;
            }
            .sm-st .green {
                background:#86ba41 !important;
            }
            .pink {
                background:#AC75F0 !important;
            }
            .yellow-b {
                background: #fdd752 !important;
            }
            .stat-elem {

                background-color: #fff;
                padding: 18px;
                border-radius: 40px;

            }

            .stat-info {
                text-align: center;
                background-color:#fff;
                border-radius: 5px;
                margin-top: -5px;
                padding: 8px;
                -webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
                box-shadow: 0 1px 0px rgba(0,0,0,0.05);
                font-style: italic;
            }

            .stat-icon {
                text-align: center;
                margin-bottom: 5px;
            }

            .st-red {
                background-color: #F05050;
            }
            .st-green {
                background-color: #27C24C;
            }
            .st-violet {
                background-color: #7266ba;
            }
            .st-blue {
                background-color: #23b7e5;
            }

            .stats .stat-icon {
                color: #28bb9c;
                display: inline-block;
                font-size: 26px;
                text-align: center;
                vertical-align: middle;
                width: 50px;
                float:left;
            }

            .stat {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                display: inline-block;
                margin-right: 10px; }
            .stat .value {
                font-size: 20px;
                line-height: 24px;
                overflow: hidden;
                text-overflow: ellipsis;
                font-weight: 500; }
            .stat .name {
                overflow: hidden;
                text-overflow: ellipsis; }
            .stat.lg .value {
                font-size: 26px;
                line-height: 28px; }
            .stat.lg .name {
                font-size: 16px; }
            .stat-col .progress {height:2px;}
            .stat-col .progress-bar {line-height:2px;height:2px;}

            .item {
                padding:30px 0;
            }
        </style>
        <div class="panel panel-default panel-intro">
            <div class="panel-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" id="one">
                        <div class="row" style="margin-top:15px;">
                            <div class="col-lg-12">
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="panel bg-blue">
                                    <div class="panel-body">
                                        <div class="panel-title">
                                            <h5>
                                                文章统计
                                            </h5>
                                        </div>
                                        <div class="panel-content">
                                            <h1 class="no-margins">
                                                {{ $articlesCount }}
                                            </h1>
                                            <div class="stat-percent font-bold text-gray">
                                                <i class="fa fa-commenting">
                                                </i>
                                                {{ $articlesCount }}
                                            </div>
                                            <small>
                                                当前文章总数
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="panel bg-aqua-gradient">
                                    <div class="panel-body">
                                        <div class="ibox-title">
                                            <h5>
                                                阅读统计
                                            </h5>
                                        </div>
                                        <div class="ibox-content">
                                            <h1 class="no-margins">
                                                {{ $readsCount }}
                                            </h1>
                                            <div class="stat-percent font-bold text-gray">
                                                <i class="fa fa-modx">
                                                </i>
                                                {{ $readsCount }}
                                            </div>
                                            <small>
                                                当前阅读总数
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="panel bg-purple-gradient">
                                    <div class="panel-body">
                                        <div class="ibox-title">
                                            <h5>
                                                交流统计
                                            </h5>
                                        </div>
                                        <div class="ibox-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h1 class="no-margins">
                                                        {{ $commentsCount }}
                                                    </h1>
                                                    <div class="font-bold text-navy">
                                                        <i class="fa fa-commenting">
                                                        </i>
                                                        <small>
                                                            评论次数
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 class="no-margins">
                                                        {{ $zansCount }}
                                                    </h1>
                                                    <div class="font-bold text-navy">
                                                        <i class="fa fa-heart">
                                                        </i>
                                                        <small>
                                                            点赞次数
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="panel bg-green-gradient">
                                    <div class="panel-body">
                                        <div class="ibox-title">
                                            <h5>
                                                标签统计
                                            </h5>
                                        </div>
                                        <div class="ibox-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h1 class="no-margins">
                                                        {{ $tagsCount }}
                                                    </h1>
                                                    <div class="font-bold text-navy">
                                                        <i class="fa fa-commenting">
                                                        </i>
                                                        <small>
                                                            标签个数
                                                        </small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="box box-danger">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            最新文章
                                        </h3>
                                    </div>
                                    <div class="box-body" id="news-list">
                                        <ul class="nav nav-stacked">
                                            @foreach($articles as $article)
                                            <li>
                                                <a href="{{ route('article',['article' => $article->id]) }}" target="_blank">
                                                <span class="text">
                                                    {{ $article->title }}
                                                </span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            最新吐槽
                                        </h3>
                                    </div>
                                    <div class="box-body" id="discussion-list">
                                        <ul class="products-list product-list-in-box">
                                            @foreach($weiyus as $weiyu)
                                            <li class="item">
                                                <div class="">
                                                    <a class="product-title" href="javascript:void(0)" target="_blank">
                                                       {!! $weiyu->content !!}
                                                    </a>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            最新评论
                                        </h3>
                                    </div>
                                    <div class="box-body" id="discussion-list">
                                        <ul class="products-list product-list-in-box">
                                            @foreach($comments as $comment)
                                                <li class="item">
                                                    <div class="">
                                                        <a class="product-title" href="{{ route('article',['article' => $comment->article_id]) }}#comment-{{ $comment->id }}" target="_blank">
                                                            {!! $comment->content !!}
                                                        </a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="two">
                        <div class="row">
                            <div class="col-xs-12">
                                这里是你的自定义数据
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection