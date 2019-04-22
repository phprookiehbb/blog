<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 14:09
 */

namespace App\Http\Services;


use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\User;

class CommentCreateService
{
    /**
     * 添加评论
     * @param Request $request
     */
    public function comment(Request $request)
    {
        $user_id = $request->post('user_id');
        $content = $this->strReplace(htmlspecialchars($request->post('comment')));
        $name = $request->post('author');
        $url = $request->post('url');
        $email = $request->post('email');
        $article_id = $request->post('id');
        $comment_id = $request->post('comment_id');
        $type = $request->post('type');
        $remind = $request->post('remind', 0);
        $to_id = $request->post('to_id');

        $default = "http://blog.crasphter.cn/public/images/default.jpg";
        $hash = md5(strtolower(trim($email)));
        $avatar = "https://cn.gravatar.com/avatar/" . $hash . "?s=64&d=" . urlencode( $default );
        //先判断用户是否存在
        $user = User::where(['name' => $name,'email' => $email])->first();
        if(empty($user))
        {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = bcrypt($email);
            $user->url = $url;
            $user->avatar = $avatar;
            $user->ip = $request->getClientIp();
            $user->fen = 0;
            $user->save();
            //保存用户登录状态
            \Auth::guard('web')->attempt(['name' => $name,'password' => $email],1);
        }else{
            \Auth::guard('web')->attempt(['name' => $name,'password' => $email],1);
        }
        $status = 0;
        if($user->id == 1)
        {
            $status = 1;
        }
        //comment_id == 0时为1级评论
        if(!$comment_id)
        {
            $floor = Comment::where('article_id',$article_id)->count();
            $floor++;
            $comment = Comment::create([
                'content' => $content,
                'user_id' => $user->id,
                'article_id' => $article_id,
                'status' => $status,
                'floor' => $floor,
                'type' => $type,
                'remind' => $remind
            ]);
        }else{
            $call_user = User::where('id',$user_id)->value('name');
            $comment = CommentReply::create([
                'content' => $content,
                'user_id' => $user->id,
                'status' => $status,
                'comment_id' => $comment_id,
                'call_user' => json_encode(['id' => $user_id,'username' => $call_user]),
                'to_user_id' => $user_id,
                'to_id'      => $to_id,
                'remind' => $remind

            ]);
        }
        if($comment)
        {
            $res = '';
            $res .= '<li class="comment even thread-even depth-1 parent comment-list" id="comment-'.$comment->id.'" data-no-instant="">';
            $res .= '<div id="div-comment-'.$comment->id.'" class="comment-body"><div class="comment-avatar-area">';
            $res .= '<img alt="'.$name.'" src="'.$avatar.'"  onerror="onerror=null;src=\'http://blog.crasphter.cn/public/images/default.jpg\'"  class="no-error avatar avatar-50 photo"  width="50" height="50"></div><div class="comment-content-area"><div class="comment-content-user">';
            $res .= '<span class="comment-auth"><a target="_blank" href="'.$user['url'].'" rel="external nofollow" class="url">'.$name.'</a></span>';
            if($user->id != 1){
                $res .= '<span class="level level-"'.$user->level.'" title="等级 Lv."'.$user->level.'"，共有积分 "'.$user->fen.'" 分，还差 "'.$user->fen.'" 分升级至 Lv."'.$user->level.'">Lv '.$user->level.'</span>';
            }else{
                $res .= '<span class="level level-admin" title="站长呦！">站长</span>';
            }
            $res .= '</div><div class="comment-content-text"><p>'.$content.'</p><p class="comment-awaiting-moderation"><i class="fa fa-lock"></i> 该评论正在审核中...</p></div>';
            $res .= '</div></div></li>';
            return $res;
        }
    }
    /**
     * 评论替换
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    protected  function strReplace($content){
        # 替换空格和换行
        $pattern = array(
            '/ /',//半角下空格
            '/　/',//全角下空格
        );
        $replace = array('&nbsp;','&nbsp;');
        $content = preg_replace($pattern, $replace, $content);
        //$content = "[pre]alert(1)[/pre]sfsfsdssafsa[img]http://www.baidu.com[/img]sdfsafsd[url=sadfsfsda]sdasfdas[/url]";
        //[pre][/pre]    --------><pre></pre>
        //[img][/img]    --------><a href="https://ww2.sinaimg.cn/large/0072Lfvtly1ft533ldpezj30k00zkgpq.jpg" class="comment-t-img-a"><i class="fa fa-picture-o"></i> 查看图片</a>
        //[url]dddddd[/url]<a href="https://mkblog.cn/go/?url=http://www.baidu.com" target="_blank" class="comment-t-a links" rel="nofollow noopener">试一下连接</a>
        //依次过滤pre，img，url
        $pre = preg_replace ( '/\[pre\]([\s\S]*?)\[\/pre\]/imU' ,  '<pre>$1</pre>' ,  $content );
        $img = preg_replace ( '/\[img\](.*)\[\/img\]/imU' ,  '<a href="$1" class="comment-t-img-a"><i class="fa fa-picture-o"></i> 查看图片</a>' ,  $pre );
        return preg_replace ( '/\[url=(.*)\](.*)\[\/url\]/imU' ,  '<a href="$1" target="_blank" class="comment-t-a links" rel="nofollow noopener">$2</a> ' ,  $img );
    }
}