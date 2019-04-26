<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/26
 * Time: 10:10
 */

namespace App\Http\Middleware;
use Closure;

class Defence
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //当为http1.0时，跳转404，防止灌注评论
        if($request->server('SERVER_PROTOCOL') == 'HTTP/1.0')
        {
            return response()->view('home.layout.errors', [], 404);
        }
        return $next($request);
    }
}