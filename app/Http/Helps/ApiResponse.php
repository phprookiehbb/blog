<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/26
 * Time: 16:37
 */

namespace App\Http\Helps;

use Symfony\Component\HttpFoundation\Response as FoundationResponse;
use Response;

trait ApiResponse
{
    public function success($msg,  $url = '')
    {
        return json_encode([
            'msg' => $msg,
            'code' => 1,
            'url' => $url
        ]);
    }
    public function error($msg, $url = '')
    {
        return json_encode([
            'msg' => $msg,
            'code' => 0,
            'url' => $url
        ]);
    }
}