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
            <p style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;">您在《<a style="color:#FFFFFF;font-weight:bold;text-decoration:none;" href="{{ route('nav.'.get_nav_by_id($comment->comment->type)['url']) }}" target="_blank">{{ get_nav_by_id($comment->comment->type)['name'] }}</a>》页面中的留言有回复啦！</p>
        @else
            <p style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;">您在《<a style="color:#FFFFFF;font-weight:bold;text-decoration:none;" href="{{ route('article',['article' => $comment->comment->article_id]) }}" target="_blank">{{ $comment->comment->article->title }}</a>》一文上的留言有回复啦！</p>
        @endif
    </div>
    <div style="margin:0px auto;width:90%">
        <p>{{ $comment->toUser->name }}，您好!</p>
        @if($comment->article_id == 0)
        <p>您于 {{ $comment->comment->created_at }} 在页面《{{ get_nav_by_id($comment->comment->type)['name'] }}》上发表评论：</p>
        @else
            <p>您于 {{ $comment->comment->created_at }} 在文章《{{ $comment->comment->article->title }}》上发表评论：</p>
        @endif
        <p style="background:#EFEFEF;margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">{{ $comment->comment->content }}</p>
        <p>{{ $comment->user->name }}给您的回复如下：</p>
        <p style="background:#EFEFEF;margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">{{ $comment->content }}</p>
        @if($comment->article_id == 0)
        <p>您可以点击 <a style="color:#42b983;text-decoration:none；" href="{{ route('nav.'.get_nav_by_id($comment->comment->type)['url']) }}" target="_blank">查看回复的完整內容</a>。</p>
        @else
            <p>您可以点击 <a style="color:#42b983;text-decoration:none；" href="{{ route('article',['article' => $comment->comment->article_id]) }}" target="_blank">查看回复的完整內容</a>。</p>
        @endif
        <p>感谢您对 <a style="color:#42b983;text-decoration:none；" href="{{ env('APP_URL') }}" target="_blank">{{ env('APP_NAME') }}</a> 的关注，如您有任何疑问，欢迎来我网站留言。</p>
        <p>（注：此邮件由系统自动发出，请勿回复。）</p>
    </div>
</div>
@else
    <div style="border-radius:5px;font-size:13px;width:680px;font-family:微软雅黑,'Helvetica Neue',Arial,sans-serif;margin:10px auto 0px;border:1px solid #eee;max-width:100%;">
        <div style="width:100%;background:#49BDAD;color:#FFFFFF;border-radius:5px 5px 0 0;">
            @if($comment->article_id == 0)
            <p style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;">您在《<a style="color:#FFFFFF;font-weight:bold;text-decoration:none;" href="{{ route('nav.'.get_nav_by_id($comment->comment->type)['url']) }}" target="_blank">{{ get_nav_by_id($comment->comment->type)['name'] }}</a>》页面上的留言有回复啦！</p>
            @else
                <p style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;">您在《<a style="color:#FFFFFF;font-weight:bold;text-decoration:none;" href="{{ route('article',['article' => $comment->comment->article_id]) }}" target="_blank">{{ $comment->comment->article->title }}</a>》一文上的留言有回复啦！</p>

            @endif
        </div>
        <div style="margin:0px auto;width:90%">
            <p>{{ $comment->toUser->name }}，您好!</p>
            @if($comment->article_id == 0)
            <p>您于 {{ $comment->reply->created_at }} 在页面《{{ get_nav_by_id($comment->comment->type)['name'] }}》上发表评论：</p>
            @else
                <p>您于 {{ $comment->reply->created_at }} 在文章《{{ $comment->comment->article->title }}》上发表评论：</p>
            @endif
                <p style="background:#EFEFEF;margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">{{ $comment->reply->content }}</p>
            <p>{{ $comment->user->name }}给您的回复如下：</p>
            <p style="background:#EFEFEF;margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">{{ $comment->content }}</p>
                @if($comment->article_id == 0)
            <p>您可以点击 <a style="color:#42b983;text-decoration:none；" href="{{ get_nav_by_id($comment->comment->type)['name'] }}" target="_blank">查看回复的完整內容</a>。</p>
              @else
             <p>您可以点击 <a style="color:#42b983;text-decoration:none；" href="{{ route('article',['article' => $comment->reply->comment->article_id]) }}" target="_blank">查看回复的完整內容</a>。</p>
            @endif
            <p>感谢您对 <a style="color:#42b983;text-decoration:none；" href="{{ env('APP_URL') }}" target="_blank">{{ env('APP_NAME') }}</a> 的关注，如您有任何疑问，欢迎来我网站留言。</p>
            <p>（注：此邮件由系统自动发出，请勿回复。）</p>
        </div>
    </div>
@endif
</body>
</html>
