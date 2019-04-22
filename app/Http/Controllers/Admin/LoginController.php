<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        if(Auth::guard('admin')->user())
        {
            return redirect(route('admin.index'));
        }
        return view('admin.login.index');
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = intval($request->input('remember',0));
        if(Auth::guard('admin')->attempt(compact('email','password'),$remember))
        {
            return $this->success('登录成功',route('admin.index'));
        }
        return $this->success('登录失败',route('article.index'));
    }
    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect(route('login.index'));
    }
}
