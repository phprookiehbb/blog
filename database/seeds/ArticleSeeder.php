<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ArticleSeeder extends Seeder
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
        DB::table('articles')->insert([
            'id'  => 1,
            'category_id' => 2,
            'sort' => 1,
            'title' => '测试',
            'keywords' => '测试',
            'description' => '测试',
            'content' => '测试的文本',
            'markdown' => '测试的文本',
            'type' => 'y',
            'source' => '',
            'click' => 30,
            'comment' => 0,
            'zan' => 15,
            'status' => 1,
            'author' => '',
            'img' => '',
            'created_at' => $time,
            'updated_at' => $time
        ]);
        DB::table('tags')->insert([
            'id' => 1,
            'tag' => '测试',
            'times' => 1,
            'created_at' => $time,
            'updated_at' => $time
        ]);
        DB::table('article_tag')->insert([
            'id' => 1,
            'article_id' => 1,
            'tag_id' => 1
        ]);
    }
}
