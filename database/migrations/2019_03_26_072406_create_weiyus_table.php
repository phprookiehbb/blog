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
            $table->text('content');
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedMediumInteger('zan')->default(30);
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
        Schema::dropIfExists('weiyu');
    }
}
