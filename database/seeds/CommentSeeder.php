<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CommentSeeder extends Seeder
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
        DB::table('comments')->insert([
            'id'  => 1,
            'content' => '第一条评论',
            'user_id' => 1,
            'article_id' => 1,
            'floor' => 1,
            'status' => 1,
            'type' => 1,
            'remind' => 1,
            'created_at' => $time,
            'updated_at' => $time
        ]);
    }
}
