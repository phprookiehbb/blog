<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                'unique:admins,email,'.$this->route()->originalParameter('admin')
            ],
            'password' => [
                'required',
                'min:6',
                'max:18',
                'alpha_dash'
            ],
            'name' => [
                'required',
                'min:2',
                'max:18',
                'unique:admins,name,'.$this->route()->originalParameter('admin')
            ]
        ];
    }
    public function messages()
    {
        return [
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式错误',
            'email.unique' => '邮箱已存在',
            'password.required' => '密码不能为空',
            'password.min' => '密码不能少于6位',
            'password.max' => '密码不能大于18位',
            'password.alpha_dash' => '密码只能是字母，数字，下划线',
            'name.required' => '昵称不能为空',
            'name.min' => '昵称不能小于2位',
            'name.max' => '昵称最多18位',
            'name.unique' => '昵称已存在',
        ];
    }
}
