<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ConfigSeeder extends Seeder
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
        DB::table('configs')->insert([
            [
                'name' => 'web_name',
                'value' => 'CraspHB彬的博客 | 一个php爱好者',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_keywords',
                'value' => 'CraspHB彬的博客,CraspHB彬,CraspHB,PHP,phprookie,博客',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_description',
                'value' => '一个编程爱好者,互联网技术的分享者、实践者、学习者、吐槽者 ...',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_copyright',
                'value' => 'Copyright 2017-2018 © crasphter.cn',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_record',
                'value' => 'crasphb彬 保留所有权利 - 豫ICP备17032233号-1',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_github',
                'value' => 'https://github.com/phprookiehbb/',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_logo',
                'value' => '/storage/system/pxkfCn8QBddelHWOoDm9ScP1pJoVmFdr8sHfriBK.png',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_author',
                'value' => 'Crasph彬',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_comment',
                'value' => '1',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_article_copyright',
                'value' => '注：本文为 Crasph彬 原创文章，转载无需和我联系，但请注明来自 <a href="{url}">{url}</a>Crasph彬的博客。',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_paginate',
                'value' => '12',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'web_reward',
                'value' => '1',
                'created_at' => $time,
                'updated_at' => $time
            ]
        ]);
    }
}
