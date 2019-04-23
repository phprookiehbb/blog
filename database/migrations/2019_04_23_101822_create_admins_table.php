<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',30)->unique()->nullable(false)->comment('邮箱');
            $table->string('password')->nullable(false)->comment('密码');
            $table->string('name',50)->nullable(false)->comment('用户名');
            $table->string('avatar')->comment('头像');
            $table->string('login_ip',20)->comment('登录ip');
            $table->unsignedMediumInteger('times')->default(0)->comment('登录次数');
            $table->timestamp('login_time')->comment('登录时间');
            $table->string('info')->comment('简介');
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
        Schema::dropIfExists('admins');
    }
}
