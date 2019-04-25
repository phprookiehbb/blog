<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/16
 * Time: 10:57
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::orderBy('id','asc')->paginate(20);
        return view('admin.admin.index',compact('admins'));
    }
    public function create()
    {
        return view('admin.admin.create');
    }
    public function store(AdminRequest $request, Admin $admin)
    {
        $admin->name = $request->post('name');
        $admin->email = $request->post('email');
        $admin->password = bcrypt($request->post('password'));
        $admin->avatar = $request->post('avatar') ?? '';
        $admin->info = $request->post('info') ?? '';
        $admin->save();
        return $this->success('添加成功',route('admins.index'));
    }
    public function edit(Admin $admin)
    {
        return view('admin.admin.edit',compact('admin'));
    }
    public function update(AdminRequest $request, Admin $admin)
    {
        $admin->name = $request->post('name');
        $admin->email = $request->post('email');
        if($request->post('password')) {
            $admin->password = bcrypt($request->post('password'));
        }
        $admin->avatar = $request->post('avatar') ?? '';
        $admin->info = $request->post('info') ?? '';
        $admin->save();
        return $this->success('修改成功',route('admins.index'));
    }
    public function destory(Admin $admin)
    {
        if($admin->id == 1)
        {
            return $this->error('超级管理员不能删除',route('admins.index'));
        }
        $admin->delete();
        return redirect()->back();
    }
}