<?php

namespace App\Http\Requests;

use App\Models\Nav;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer',
                function($attribute, $value, $fail) {
                    if (!Nav::find($value)) {
                        return $fail('分类不存在');
                    }
                },
            ],
            'title' => ['required'],
            'markdown' => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'category_id.required'  => '分类不能为空',
            'category_id.integer'  => '分类错误',
            'title.required'  => '文章标题不能为空',
            'markdown.required'  => '文章内容不能为空',
        ];
    }
}
