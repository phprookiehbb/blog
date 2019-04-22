<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('导航名称');
            $table->string('url')->comment('导航url');
            $table->text('content')->nullable(true)->comment('内容');
            $table->text('markdown')->nullable(true)->comment('markdown内容');
            $table->unsignedTinyInteger('sort')->default(5)->comment('页面顺序');
            $table->unsignedTinyInteger('status')->default(1)->comment('导航状态，1：开启，0：关闭');
            $table->string('template')->nullable(true)->comment('页面模板');
            $table->unsignedTinyInteger('is_comment')->default(1)->comment('1:开启评论，0：不开启评论');
            $table->nestedSet();
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
        Schema::dropIfExists('navs');
    }
}
