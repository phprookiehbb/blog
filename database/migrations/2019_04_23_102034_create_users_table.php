<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',30)->unique()->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->string('url')->default('')->comment('网址');
            $table->string('name',50)->default('')->comment('用户名');
            $table->string('avatar')->comment('头像');
            $table->unsignedMediumInteger('comments')->default(0)->comment('评论量');
            $table->unsignedMediumInteger('fen')->default(0)->comment('积分');
            $table->string('ip',20)->default('')->comment('登录ip');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
