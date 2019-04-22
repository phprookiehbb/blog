<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 10:23
 */


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeiyuRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'markdown' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'markdown.required' => '内容不能为空'
        ];
    }
}