<?php

namespace App\Http\Requests;


class NavRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','min:1','max:15'],
            'markdown' => ['required'],
            'template' => ['required'],
            'url'  => [
                'required',
                'unique:navs,url,'.$this->route()->originalParameter('nav')
            ]
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '导航名称不能为空',
            'name.min' => '导航名称不能少于1个字符',
            'name.max' => '导航名称最多15个字符',
            'markdown.required' => '内容不能为空',
            'template.required' => '所属模板不能为空',
            'url.required' => '导航链接不能为空',
            'url.unique' => '导航链接已存在',
        ];
    }
}
