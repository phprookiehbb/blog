<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeiyusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weiyus', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content')->comment('html的内容');
            $table->text('markdown')->comment('markdown内容');
            $table->unsignedMediumInteger('zan')->comment('赞的量');
            $table->unsignedTinyInteger('status')->default(1)->comment('1：展示，0：不展示');
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
        Schema::dropIfExists('weiyus');
    }
}
