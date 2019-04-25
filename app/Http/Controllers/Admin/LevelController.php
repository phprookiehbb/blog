<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Request;
use App\Models\Level;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{

    public function index()
    {
        $levels = Level::orderBy('level','asc')->get();
        return view('admin.level.index',compact('levels'));
    }


    public function create()
    {
        return view('admin.level.create');
    }

    public function store(Level $level, Request $request)
    {

        $level->level = $request->input('level');
        $level->fen = $request->input('fen');
        $level->save();

        return $this->success('创建成功',route('level.index'));
    }

    public function edit(Level $level)
    {
        return view('admin.level.edit',compact('level'));
    }


    public function update(Level $level, Request $request)
    {

        $level->level = $request->input('level');
        $level->fen = $request->input('fen');
        $level->save();
        return $this->success('修改成功',route('level.index'));
    }


    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->back();
    }
}
