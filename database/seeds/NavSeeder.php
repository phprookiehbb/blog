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
                'content' => '归档',
                'markdown' => '归档',
                'zan'  => 20,
                'status' => 1,
                'sort' => 1,
                'template' => '_template_achive',
                'is_comment' => 1,
                '_lft' => 1,
                '_rgt' => 2,
                'parent_id' => ''
            ],
            [
                'id'  => 2,
                'name' => 'php',
                'url'  => 'php',
                'content' => 'php',
                'markdown' => 'php',
                'zan'  => 20,
                'status' => 1,
                'sort' => 1,
                'template' => '_template_category',
                'is_comment' => 1,
                '_lft' => 3,
                '_rgt' => 4,
                'parent_id' => ''
            ],
            [
                'id'  => 3,
                'name' => '友链',
                'url'  => 'link',
                'content' => '<h2 id="h2-u53CBu60C5u94FEu63A5"><a name="友情链接" class="reference-link"></a><span class="header-link octicon octicon-link"></span>友情链接</h2><ul>
<li><a href="https://crasphter.cn" title="crasphb彬的博客">crasphb彬的博客</a>   </li></ul>
<h2 id="h2-u8981u6C42"><a name="要求" class="reference-link"></a><span class="header-link octicon octicon-link"></span>要求</h2><ul>
<li>博客内容原创为主</li><li>博客文章 &gt;= 15 篇且建站时间 &gt;= 6个月</li><li>博客内无违法违规内容</li><li>博客拥有独立的域名</li><li>博主的好基友可以无视上面的所有要求。。</li></ul>
<p>如果您的网站满足上述要求，可在下方留言板申请友链。</p>
<h2 id="h2-u683Cu5F0F"><a name="格式" class="reference-link"></a><span class="header-link octicon octicon-link"></span>格式</h2><ul>
<li>网站地址：</li><li>网站名称：</li><li>网站描述：</li></ul>
<h2 id="h2-u672Cu7AD9u4FE1u606F"><a name="本站信息" class="reference-link"></a><span class="header-link octicon octicon-link"></span>本站信息</h2><ul>
<li>网站地址：<a href="https://test.cn">https://test.cn</a></li><li>网站名称：test的博客</li><li><p>一个专注php的博客</p>
<h4 id="h4--"><a name="注：只接受博客类友链。" class="reference-link"></a><span class="header-link octicon octicon-link"></span>注：只接受博客类友链。</h4></li></ul>',
                'markdown' => '## 友情链接

- [crasphb彬的博客](https://crasphter.cn "crasphb彬的博客")   


## 要求

   - 博客内容原创为主
   - 博客文章 >= 15 篇且建站时间 >= 6个月
   -  博客内无违法违规内容
   -  博客拥有独立的域名
   -  博主的好基友可以无视上面的所有要求。。

如果您的网站满足上述要求，可在下方留言板申请友链。

## 格式

  - 网站地址：
  - 网站名称：
  - 网站描述：


## 本站信息
   - 网站地址：https://test.cn
   -  网站名称：test的博客
   - 一个专注php的博客
   
 #### 注：只接受博客类友链。',
                'zan'  => 20,
                'status' => 1,
                'sort' => 1,
                'template' => '_template_single',
                'is_comment' => 1,
                '_lft' => 5,
                '_rgt' => 6,
                'parent_id' => ''
            ]
        ]);
        \App\Http\Services\NavChangeService::change();
    }
}
