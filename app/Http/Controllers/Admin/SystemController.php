<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/10
 * Time: 9:40
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function basic()
    {
        return view('admin.system.basic');
    }
    public function sys()
    {
        return view('admin.system.sys');
    }
    public function store(Request $request)
    {
        $data = $request->post();
        unset($data['file']);
        collect($data)->map(function($value, $key){
            $value = $value ?? '';
            Config::updateOrCreate(
                ['name' => $key],
                ['name' => $key, 'value' => $value]
            );
        });
        return $this->success('设置成功');
    }
    public function upload(Request $request)
    {
        $path = $request->file('file')->store('system');
        return json_encode(['code' => 0,'result' => '/storage/'. $path]);
    }

}