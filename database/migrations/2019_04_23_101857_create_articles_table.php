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
            $table->unsignedMediumInteger('category_id');
            $table->unsignedTinyInteger('sort')->default(0)->comment('排序');
            $table->string('title')->comment('标题');
            $table->string('keywords')->default('')->comment('关键字');
            $table->text('description')->comment('描述');
            $table->text('content')->comment('html的内容');
            $table->text('markdown')->comment('markdown内容');
            $table->string('type',50)->default('')->comment('属性');
            $table->string('source')->default('')->comment('来源');
            $table->unsignedMediumInteger('click')->default(0)->comment('浏览量');
            $table->unsignedMediumInteger('comment')->default(0)->comment('评论量');
            $table->unsignedMediumInteger('zan')->default(0)->comment('赞的量');
            $table->unsignedTinyInteger('status')->default(1)->comment('1：展示，0：不展示');
            $table->string('author',60)->default('')->comment('作者');
            $table->string('img')->default('')->comment('封面图');
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
