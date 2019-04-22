<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NavRequest;
use App\Http\Services\NavService;
use App\Models\Nav;
use App\Http\Controllers\Controller;

class NavController extends Controller
{
    //
    public function index()
    {
        $navs = Nav::get()->toFlatTree();
        return view('admin.nav.index',compact('navs'));
    }
    public function create()
    {
        //树状的所有值
        $navs = Nav::get()->toFlatTree();
        $templates = get_template();
        return view('admin.nav.create',compact('navs','templates'));
    }
    public function store(NavRequest $request)
    {
        NavService::change($request,'create');
        //写入前台路由
        return $this->success('添加成功',route('nav.index'));
    }
    public function edit(Nav $nav)
    {
        $navs = Nav::get()->toFlatTree();
        $templates = get_template();
        return view('admin.nav.edit',compact('navs','nav','templates'));
    }
    public function update(NavRequest $request, Nav $nav)
    {
        NavService::change($request,'update');
        return $this->success('修改成功',route('nav.index'));
    }
    public function destroy(Nav $nav)
    {
        $nav->delete();
        return redirect()->back();
    }
}
