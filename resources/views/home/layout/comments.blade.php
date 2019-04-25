@if(get_config('web_comment') == 1)
<!-- #post -->
<div class="comments-area" id="comments">
    <div class="comment-respond" id="respond">
        <div class="comment-reply-title">
            <span>
                发表评论
            </span>
            <a data-no-instant="" hidden="" href="javascript:;" id="cancel-comment-reply-link" rel="nofollow">
                <i aria-hidden="true" class="fa fa-times">
                </i>
                取消回复
            </a>
        </div>
        <!-- comment-reply-title -->
        <form action="{{ route('comment') }}" id="commentform" method="post">
            {{ csrf_field() }}
            @auth
                <div class="comment-author-welcome">
                    @if(\Auth::user()->avatar)
                    <img alt="{{ \Auth::user()->name }}" src="{{ \Auth::user()->avatar }}" class="no-error avatar avatar-30 photo" width="30" height="30">
                    @else
                        <img alt="{{ \Auth::user()->name }}" src="{{ \Auth::user()->avatar }}" class="no-error avatar avatar-30 photo" width="30" height="30" avatar="{{ \Auth::user()->name }}">
                    @endif
                    欢迎 {{ \Auth::user()->name }} 再次光临！
                    <span title="点击编辑用户信息" onclick="jQuery('#comment-author-info').slideToggle()" class="links">编辑信息</span>
                    <a href="http://mkblog.cn/695/?from=cmt" target="_blank" class="links">修改头像</a>
                </div>
        @endauth
        <!-- comment-author-welcome -->
            <div id="comment-author-info" @auth hidden="" @endauth>
                <div class="comment-form-author">
                    <label for="author">
                        昵称（必填）
                    </label>
                    <input class="commenttext" id="author" name="author" required="" @auth value="{{ \Auth::user()->name }}" @endauth autocomplete="off" tabindex="1" type="text" value=""/>
                </div>
                <div class="comment-form-email">
                    <label for="email">
                        邮箱（必填）
                    </label>
                    <input class="commenttext" id="email" name="email" required="" @auth  value="{{ \Auth::user()->email }}" @endauth autocomplete="off"  tabindex="2" type="email" value=""/>
                </div>
                <div class="comment-form-url">
                    <label for="url">
                        网址
                    </label>
                    <input class="commenttext" id="url" name="url" tabindex="3" @auth value="{{ \Auth::user()->url }}" @endauth autocomplete="off"  type="text" value=""/>
                </div>
            </div>
            <div class="comment-form-comment">
                <textarea id="comment" name="comment" placeholder="" required="" rows="4" autocomplete="off"  tabindex="4"></textarea>
                <div class="comment-form-tools">
                    <span data-action="emoji" title="插入表情">
                        <i aria-hidden="true" class="fa fa-smile-o">
                        </i>
                        表情
                    </span>
                    <span data-action="pic" title="插入图片">
                        <i aria-hidden="true" class="fa fa-picture-o">
                        </i>
                        图片
                    </span>
                    <span data-action="url" title="插入超链接">
                        <i aria-hidden="true" class="fa fa-link">
                        </i>
                        链接
                    </span>
                    <span data-action="code" title="插入代码段">
                        <i aria-hidden="true" class="fa fa-code">
                        </i>
                        代码
                    </span>
                    <span data-action="close" style="float: right;" title="关闭工具条">
                        <i aria-hidden="true" class="fa fa-times">
                        </i>
                    </span>
                </div>
            </div>
            <p id="comment-tips">
            </p>
            <div class="comment-form-submit">
                <input id="comment_post_ID" name="id" type="hidden" value="{{ $article_id }}"/>
                <input id="comment_user_id" name="user_id" type="hidden" value="0"/>
                <input id="comment_comment_id" name="comment_id" type="hidden" value="0"/>
                <input id="comment_to_id" name="to_id" type="hidden" value="0"/>
                <input  name="type" type="hidden" value="{{ $type }}"/>
                <span class="comment-mail-notify">
                    <label class="mk-checkbox">
                        <input checked="" id="comment_mail_notify" name="remind" type="checkbox" value="1">
                            <div>
                                <div>
                                </div>
                            </div>
                            接收回复邮件通知
                        </input>
                    </label>
                </span>
                <button id="submit" tabindex="5" type="submit">
                    提交评论
                </button>
            </div>
        </form>
    </div>
    <!-- respond -->
    <!-- 评论列表 -->
    <ol class="comment-list">
        <!-- #comment-## -->
        @foreach($comments as $comment)
            <li class="comment even thread-even depth-1 parent" data-no-instant="" id="comment-{{ $comment->id }}">
                <div class="comment-body" id="div-comment-{{ $comment->id }}">
                    <div class="comment-avatar-area">
                        @if($comment->user->avatar)
                        <img alt="{{ $comment->user->name }}" class="no-error avatar avatar-50 photo" height="50" onerror="onerror=null;src='http://blog.crasphter.cn/public/images/default.jpg'"  src="{{ $comment->user->avatar }}" width="50"/>
                        @else
                            <img src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}" class="no-error avatar avatar-50 photo" height="50" avatar="{{ $comment->user->name }}" width="50"/>
                        @endif
                    </div>
                    <div class="comment-content-area">
                        <div class="comment-content-user">
                                <span class="comment-auth">
                                    {{ $comment->user->name }}
                                </span>
                            <!-- 评论等级 -->
                            @if($comment->user->id != 1)
                                <span class="level level-{{ (get_level($comment->user->fen))['level'] }}" title="等级 Lv.{{ (get_level($comment->user->fen))['level'] }}，共有积分 {{ $comment->user->fen }} 分，还差 {{ (get_level($comment->user->fen))['diff'] }} 分升级至 Lv.{{ (get_level($comment->user->fen))['next'] }}">Lv {{ (get_level($comment->user->fen))['level'] }}</span>
                            @else
                                <span class="level level-admin" title="站长呦！">站长</span>
                            @endif
                        </div>
                        <!-- comment-info -->
                        @if($comment->status == 0)
                            <div class="comment-content-text">
                                <p>
                                    {!! $comment->content !!}
                                </p>
                                <p class="comment-awaiting-moderation">
                                    <i class="fa fa-lock"></i> 该评论正在审核中...
                                </p>
                            </div>
                    </div>
                </div>
                @else
                    <div class="comment-content-text">
                        <p>
                            {!! $comment->content !!}
                        </p>
                    </div>
                    <div class="comment-content-info" data-no-instant="">
                        <!-- 楼层 -->
                        <span>
                                    <a href="#comment-{{ $comment->id }}">
                                        @switch($comment->floor)
                                            @case(1) 沙发
                                            @break
                                            @case(2)板凳
                                            @break
                                            @case(3)地板
                                            @break
                                            @default#{{ $comment->floor }}
                                        @endswitch
                                    </a>
                                </span>
                        <!-- 日期、删除、编辑 -->
                        <span>
                                    {{ $comment->created_at }}
                                </span>
                        @if($comment->status == 1)
                            <span>
                                <a aria-label="回复给{{ $comment->user->username }}" class="comment-reply-link" href="#respond" onclick='return addComment.moveForm( "div-comment-{{ $comment->id }}","{{ $comment->id }}", "respond", "{{ $comment->user->id }}" , "0")' rel="nofollow">
                                    回复
                                </a>
                            </span>
                        @endif
                    </div>
                    <!-- comment-content-info -->
</div>
<!-- comment-content-area -->
</div>
@endif
<!-- .comment-body -->
@if(!empty($comment->replies))
    <ul class="children">
        @foreach($comment->replies as $reply)
            <li class="comment byuser comment-author-mengkun bypostauthor odd alt depth-2" data-no-instant="" id="comment-{{ $reply->id }}">
                <div class="comment-body" id="div-comment-{{ $reply->id }}">
                    <div class="comment-avatar-area">
                        @if($reply->user->avatar)
                        <img alt=" {{ $reply->user->name }}" class="no-error avatar avatar-50 photo" height="50" onerror="onerror=null;src='http://blog.crasphter.cn/public/images/default.jpg'"  src="{{ $reply->user->avatar }}" width="50"/>
                        @else
                            <img alt=" {{ $reply->user->name }}" avatar=" {{ $reply->user->name }}" class="no-error avatar avatar-50 photo" height="50"  width="50"/>
                        @endif
                    </div>
                    <div class="comment-content-area">
                        <div class="comment-content-user">
                                        <span class="comment-auth">
                                            {{ $reply->user->name }}
                                        </span>
                            <!-- 评论等级 -->

                            @if($reply->user->id != 1)
                                <span class="level level-{{ (get_level($reply->user->fen))['level'] }}" title="等级 Lv.{{ (get_level($reply->user->fen))['level'] }}，共有积分 {{ $reply->user->fen }} 分，还差 {{ (get_level($reply->user->fen))['diff'] }} 分升级至 Lv.{{ (get_level($reply->user->fen))['next'] }}">Lv {{ (get_level($reply->user->fen))['level'] }}</span>
                            @else
                                <span class="level level-admin" title="站长呦！">站长</span>
                            @endif
                        </div>
                        <!-- comment-info -->
                        <div class="comment-content-text">
                            <p>

                                <a class="comment-at" href="#comment-{{ $reply->id }}">
                                    {!! '@' !!}{{ get_call_user($reply->call_user) }}
                                </a>
                                {{ $reply->content }}
                            </p>
                            @if($reply->status == 0)
                                <p class="comment-awaiting-moderation">
                                    <i class="fa fa-lock"></i> 该评论正在审核中...
                                </p>
                            @else
                        </div>
                        <div class="comment-content-info" data-no-instant="">
                            <!-- 楼层 -->
                            <!-- 日期、删除、编辑 -->
                            <span>
                                 {{ $reply->created_at }}
                            </span>
                            <span>
                                <a aria-label="回复给{{ $reply->user->name }}" class="comment-reply-link" href="#respond" onclick='return addComment.moveForm( "div-comment-{{ $reply->id }}", "{{ $comment->id }}", "respond", "{{ $reply->user->id }}","{{ $reply->id }}")' rel="nofollow">
                                    回复
                                </a>
                            </span>
                        </div>
                    @endif
                    <!-- comment-content-info -->
                    </div>
                    <!-- comment-content-area -->
                </div>
                <!-- .comment-body -->
            </li>
    @endforeach
    <!-- #comment-## -->
    </ul>
@endif
<!-- .children -->
</li>
@endforeach
<!-- #comment-## -->
</ol>
<!-- .comment-list -->
<!-- 评论翻页 -->
<nav class="comment-navi" id="comment-navigation">
    {{ $comments->fragment('comments')->links('home.layout.page') }}
</nav>

</div>
@endif