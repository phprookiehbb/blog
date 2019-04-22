<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::saved(function(Admin $admin){
            //超级管理员修改则同步前台的相应的超级管理员信息
            if($admin->id == 1)
            {
                $user = User::where('id',$admin->id)->first();
                $user->name = $admin->name;
                $user->avatar = $admin->avatar;
                $user->email = $admin->email;
                $user->save();
            }
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}