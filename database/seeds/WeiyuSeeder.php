<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class WeiyuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $time = date('Y-m-d H:i:s',time());
        DB::table('weiyus')->insert([
            'content' => '第一条微语',
            'markdown' => '第一条微语',
            'zan' => 20,
            'status' => 1,
            'created_at' => $time,
            'updated_at' => $time
        ]);
    }
}
