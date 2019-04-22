<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WeiyuRequest;
use App\Models\Weiyu;
use App\Http\Controllers\Controller;

class WeiyuController extends Controller
{
    /**
     * 微语展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $weiyus = Weiyu::orderBy('id','desc')->paginate(20);
        return view('admin.weiyu.index',compact('weiyus'));
    }

    /**
     * 添加展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.weiyu.create');
    }

    /**
     * 添加页面
     * @param WeiyuRequest $request
     * @return mixed
     */
    public function store(WeiyuRequest $request, Weiyu $weiyu)
    {
        $parsedown = new \Parsedown();
        $weiyu->markdown = $request->input('markdown');
        $weiyu->content = $request->input('editormd_id-html-code');
        $weiyu->save();

        return $this->success('创建成功',route('weiyu.index'));
    }
    /**修改展示
     * @param Weiyu $weiyu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Weiyu $weiyu)
    {
        return view('admin.weiyu.edit',compact('weiyu'));
    }

    /**
     * 修改操作
     * @param Weiyu $weiyu
     * @param WeiyuRequest $request
     * @return mixed
     */
    public function update(Weiyu $weiyu, WeiyuRequest $request)
    {
        $parsedown = new \Parsedown();
        $weiyu->markdown = $request->input('markdown');
        $weiyu->content = $request->input('editormd_id-html-code');
        $weiyu->save();
        return $this->success('修改成功',route('weiyu.index'));
    }

    /**
     * 删除操作
     * @param Weiyu $weiyu
     * @return mixed
     */
    public function destroy(Weiyu $weiyu)
    {
        $weiyu->delete();
        return redirect()->back();
    }
}
