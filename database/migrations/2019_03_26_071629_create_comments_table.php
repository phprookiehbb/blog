<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('article_id')->index();
            $table->unsignedInteger('floor')->comment('楼层');
            $table->unsignedTinyInteger('type')->default(1)->comment('1:文章评论，0：单页评论');
            $table->unsignedTinyInteger('remind')->default(1)->comment('1:邮件提醒，0：不提醒');
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
        Schema::dropIfExists('comments');
    }
}
