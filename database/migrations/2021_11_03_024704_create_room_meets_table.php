<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_meets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_name');
            $table->integer('room_size');
            $table->string('address');
            $table->string('feature_image_path')->nullable();
            $table->string('feature_image_name')->nullable();
            $table->integer("status")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_meets');
    }
}
