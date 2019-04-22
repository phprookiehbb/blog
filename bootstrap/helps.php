<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 11:34
 */

/**
 * 获取前台模板的文件
 * @return array
 */
function get_template()
{
    $template = scandir(str_replace('\\','/',resource_path().'/views/home/template'));
    $template = array_filter(array_map(function($value){
        if(!in_array($value, ['.','..']))
        {
            return substr($value,0,-10);
        }
    }, $template));
    return $template;
}

function get_nav()
{
    $nav =  request()->route()->getAction();;
    $name = substr($nav['as'],4);
    return \App\Models\Nav::where('url',$name)->first();
}

/**
 * 截取字符串
 * @param  [type] $str     [description]
 * @param  [type] $length  [description]
 * @param  string $charset [description]
 * @return [type]          [description]
 */
function strcut($str , $length , $charset = 'UTF-8'){
    $res = '';
    $len = mb_strlen($str);
    if($len < $length){
        return $str;
    }
    $res = mb_substr($str,0,(int)$length,$charset);
    return $res.'……';
}

/**
 * 计算时差
 * @param  [type] $time [description]
 * @return [type]       [description]
 */
function time_format($time){
    $time = strtotime($time);
    $timer = '';
    $now = time();
    $second = 1;
    $min = 60;
    $hour = 60*60;
    $day = 60*60*24;
    $diff = $now - $time;
    $month = 60*60*24*30;
    $year = 60*60*24*365;
    //计算多少天前，一个月按30天来算
    if($diff <= $min){
        return $diff.'秒前';
    }elseif( $min < $diff && $diff <=  $hour){
        $timer =  floor( $diff / $min );
        return $timer.'分前';
    }elseif( $hour < $diff && $diff <=  $day){
        $timer =  floor( $diff / $hour );
        return $timer.'小时前';
    }elseif( $day < $diff && $diff <=  $month){
        $timer =  floor( $diff / $day );
        return $timer.'天前';
    }elseif( $month < $diff && $diff <= $year){   //按月计算
        $timer =  floor( $diff / $month );
        return $timer.'月前';
    }else{   //按年计算
        $timer =  floor( $diff / $year );
        return $timer.'年前';
    }
}

/**
 * 获取子回复at的用户名
 * @param $call_user
 * @return mixed
 */
function get_call_user($call_user)
{
    $user = json_decode($call_user,true);
    return $user['username'];
}

/**
 * 评论的积分等级
 * @param $fen
 * @return array
 */
function get_level($fen)
{

    $level = \App\Models\Level::where('fen', '>=', $fen)
             ->orderBy('id','asc')
             ->first();
    $res = [
        'level' => $level['level'],
        'next' => $level['level'] + 1,
        'diff'  => $level['fen'] - $fen
    ];
    return $res;
}

/**
 * 根据id获取nav的url跟name
 * @param $id
 * @return mixed
 */
function get_nav_by_id($id)
{
    return \App\Models\Nav::where('id',$id)->select('id','name','url')->first();
}

/**
 * 获取配置信息
 * @param $name
 * @return string
 */
function get_config($name)
{
    $config = \App\Models\Config::pluck('value','name')->toArray();
    if(isset($config[$name])){
        return $config[$name];
    }
    return '';
}
function get_master_img()
{
    return \App\Models\User::where('id', 1)->first();
}
