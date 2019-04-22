<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/29
 * Time: 11:26
 */

namespace App\Http\Services;


use App\Models\Nav;

class NavService
{
    public static function change($request, $type = 'create')
    {
        $data = $request->all();
        $data['content'] = $data['editormd_id-html-code'];
        unset($data['editormd_id-html-code']);

        $parent_id = $data['parent_id'];
        if(!isset($data['status']))
        {
            $data['status'] = 0;
        }
        if(!isset($data['is_comment']))
        {
            $data['is_comment'] = 0;
        }
        if($type == 'create')
        {
            if($parent_id)
            {
                $parent = Nav::find($parent_id);
                Nav::create($data, $parent);
            }else{
                Nav::create($data);
            }
        }else{
            $nav = $request->route('nav');
            //判断是否改变parent_id
            if($data['parent_id'] != $nav->parent_id)
            {
                if($data['parent_id'])
                {
                    $parent = Nav::find($data['parent_id']);
                    $parent->appendNode($nav);
                }else{
                    //变到根节点
                    $nav->saveAsRoot();
                }
            }
            $nav->update($data);
        }

        //更新路由
        NavChangeService::change();
    }
}