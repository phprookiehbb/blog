<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $time = date('Y-m-d H:i:s', time());
        DB::table('admins')->insert([
            'id'    => 1,
            'email' => 'test@qq.com',
            'password' => bcrypt(123456),
            'name' => 'test',
            'info' => '测试的用户',
            'created_at' => $time,
            'updated_at' => $time,
            'avatar' => '',
            'login_ip' => '',
            'times' => 0
        ]);
    }
}
