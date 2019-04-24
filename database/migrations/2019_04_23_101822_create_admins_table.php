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
            $table->string('email',30)->unique()->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->string('name',50)->default('')->comment('用户名');
            $table->string('avatar')->default('')->comment('头像');
            $table->string('login_ip',20)->default('')->comment('登录ip');
            $table->unsignedMediumInteger('times')->default(0)->comment('登录次数');
            $table->timestamp('login_time')->comment('登录时间');
            $table->string('info')->default('')->comment('简介');
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
