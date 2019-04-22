<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Weiyu;


class WeiyuController extends Controller
{
    public function  index()
    {
        $weiyus = Weiyu::where('status',1)->orderBy('id','desc')->paginate(get_config('web_paginate'));
        return view('home.template._template_weiyu',compact('weiyus'));
    }
}