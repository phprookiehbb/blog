<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('category_id');
            $table->unsignedTinyInteger('sort')->default(5);
            $table->string('title')->nullable(false)->comment('标题');
            $table->string('keywords')->nullable(true)->comment('关键字');
            $table->text('description')->nullable(true)->comment('描述');
            $table->text('content')->nullable(true)->comment('html内容');
            $table->text('markdown')->nullable(true)->comment('markdown内容');
            $table->string('type')->nullable(true)->comment('类型，r:热门，t:推荐等');
            $table->string('source')->nullable(true)->comment('来源');
            $table->unsignedMediumInteger('click')->default(50)->comment('阅读量');
            $table->unsignedMediumInteger('comment')->default(0)->comment('评论量');
            $table->unsignedMediumInteger('zan')->default(20)->comment('点赞量');
            $table->unsignedTinyInteger('status')->default(1)->comment('1：展示，0：不展示');
            $table->string('author')->nullable(true)->comment('作者');
            $table->string('img')->nullable(true)->comment('文章缩略图');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
