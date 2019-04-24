<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/24
 * Time: 15:15
 */

namespace App\Http\Services;


use App\Models\Config;

class MailSetService
{
    public static function setMail()
    {
        $config = Config::pluck('value','name')->toArray();
        $mail = [
            'driver' => $config['mail_driver'],
            'port' => $config['mail_port'],
            'encryption' => $config['mail_encryption'],
            'host' => $config['mail_host'],
            'username' => $config['mail_username'],
            'password' => $config['mail_password'],
            'from' => [
                'name' => $config['mail_from_name'],
                'address' => $config['mail_from_address']
            ]
        ];
        \Illuminate\Support\Facades\Config::set(['mail' => $mail]);
    }

}