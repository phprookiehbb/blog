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
            $table->string('name');
            $table->string('url');
            $table->text('content')->comment('html的内容');
            $table->text('markdown')->comment('markdown内容');
            $table->unsignedMediumInteger('zan')->default(0)->comment('赞的量');
            $table->unsignedTinyInteger('status')->default(1)->comment('导航状态，1：开启，0：关闭');
            $table->unsignedTinyInteger('sort')->default(0);
            $table->string('template');
            $table->unsignedTinyInteger('is_comment')->default(1);
            Kalnoy\Nestedset\NestedSet::columns($table);
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
