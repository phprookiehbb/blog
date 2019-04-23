<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content')->comment('评论内容');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('comment_id');
            $table->unsignedInteger('to_user_id');
            $table->unsignedInteger('to_id');
            $table->string('call_user')->comment('@用户,{id: null, nickname: null}');
            $table->unsignedTinyInteger('status')->default(1)->comment('1：显示，0：未审核');
            $table->unsignedTinyInteger('remind')->default(0)->comment('1:邮件提醒，0：不提醒');
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
        Schema::dropIfExists('comment_replies');
    }
}
