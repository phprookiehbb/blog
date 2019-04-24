<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'    => 1,
            'email' => 'test@qq.com',
            'password' => bcrypt('test@qq.com'),
            'name' => 'test',
            'url' => '',
            'avatar' => '',
            'ip' => '',
            'comments' => 1,
            'fen' => 10
        ]);
    }
}
