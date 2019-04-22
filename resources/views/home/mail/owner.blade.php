<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if($type == 1)
    <div style="border-radius:5px;font-size:13px;width:680px;font-family:微软雅黑,'Helvetica Neue',Arial,sans-serif;margin:10px auto 0px;border:1px solid #eee;max-width:100%;">
        <div style="width:100%;background:#49BDAD;color:#FFFFFF;border-radius:5px 5px 0 0;">
            @if($comment->article_id == 0)
            <p style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;">{{ env('APP_NAME') }}：《<a style="color:#FFFFFF;font-weight:bold;text-decoration:none;" target="_blank" href="{{ route('nav.'.get_nav_by_id($comment->type)['url']) }}">{{ get_nav_by_id($comment->type)['name'] }}</a>》页面中有新的评论啦！</p>
            @else
            <p style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;">{{ env('APP_NAME') }}：《<a style="color:#FFFFFF;font-weight:bold;text-decoration:none;" target="_blank" href="{{ route('article',['article' => $comment->article_id]) }}">{{ $comment->article->title }}</a>》一文有新的评论啦！</p>
            @endif
        </div>
        <div style="margin:0px auto;width:90%">
            @if($comment->article_id == 0)
            <p>{{ $comment->user->name }} 于 {{ $comment->created_at }} 在《{{ get_nav_by_id($comment->type)['name'] }}》评论说：</p>
            @else
                <p>{{ $comment->user->name }} 于 {{ $comment->created_at }} 在《{{ $comment->article->title }}》评论说：</p>
            @endif
            <p style="background:#EFEFEF;margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">{{ $comment->content }}</p>
            <p>IP地址：{{ $comment->user->ip }}，评论邮箱：{{ $comment->user->email }}。</p>
            <p>可登录<a href="{{ route('admin.index') }}" target='_blank'>网站后台</a>管理评论。</p>
        </div>
    </div>
@else
    <div style="border-radius:5px;font-size:13px;width:680px;font-family:微软雅黑,'Helvetica Neue',Arial,sans-serif;margin:10px auto 0px;border:1px solid #eee;max-width:100%;">
        <div style="width:100%;background:#49BDAD;color:#FFFFFF;border-radius:5px 5px 0 0;">
            @if($comment->article_id == 0)
            <p style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;">{{ env('APP_NAME') }}：《<a style="color:#FFFFFF;font-weight:bold;text-decoration:none;" target="_blank" href="{{ route('nav.'.get_nav_by_id($comment->comment->type)['url']) }}">{{ get_nav_by_id($comment->comment->type)['name'] }}</a>》页面中有新的评论啦！</p>
            @else
                <p style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;">{{ env('APP_NAME') }}：《<a style="color:#FFFFFF;font-weight:bold;text-decoration:none;" target="_blank" href="{{ route('article',['article' => $comment->comment->article_id]) }}">{{ $comment->comment->article->title }}</a>》一文有新的评论啦！</p>
            @endif
        </div>
        <div style="margin:0px auto;width:90%">
            @if($comment->article_id == 0)
            <p>{{ $comment->user->name }} 于 {{ $comment->created_at }} 在《{{ get_nav_by_id($comment->comment->type)['name'] }}》评论说：</p>
            @else
                <p>{{ $comment->user->name }} 于 {{ $comment->created_at }} 在《{{ $comment->comment->article->title }}》评论说：</p>
            @endif
            <p style="background:#EFEFEF;margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">{{ $comment->content }}</p>
            <p>IP地址：{{ $comment->user->ip }}，评论邮箱：{{ $comment->user->email }}。</p>
            <p>可登录<a href="{{ route('admin.index') }}" target='_blank'>网站后台</a>管理评论。</p>
        </div>
    </div>
@endif
</body>
</html>