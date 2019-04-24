<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navs')->insert([
            [
                'id'  => 1,
                'name' => '归档',
                'url'  => 'archive',
                'content' => '',
                'markdown' => '',
                'zan'  => 20,
                'status' => 1,
                'sort' => 1,
                'template' => '_template_achive',
                'is_comment' => 1,
                '_lft' => 1,
                '_rgt' => 2,
                'parent_id' => 0
            ],
            [
                'id'  => 2,
                'name' => 'php',
                'url'  => 'php',
                'content' => '',
                'markdown' => '',
                'zan'  => 20,
                'status' => 1,
                'sort' => 1,
                'template' => '_template_category',
                'is_comment' => 1,
                '_lft' => 3,
                '_rgt' => 4,
                'parent_id' => 0
            ]
        ]);
        \App\Http\Services\NavChangeService::change();
    }
}
