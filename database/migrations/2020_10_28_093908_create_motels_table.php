<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motels', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('price');
            $table->integer('acreage');
            $table->string('infrastructure');
            $table->integer('status');
            $table->integer('hot_cold');
            $table->integer('air_conditioning');
            $table->string('bathroom');
            $table->integer('owner_id');
            $table->integer('extend');
            $table->string('now');
            $table->date('created_at');
            $table->date('updated_at');
            $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motels');
    }
}
