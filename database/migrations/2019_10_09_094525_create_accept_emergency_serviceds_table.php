<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAcceptEmergencyServicedsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accept_emergency_serviceds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('needing');
            $table->string('image')->nullable();
            $table->double('price')->nullable();
            $table->text('report')->nullable();
            $table->integer('status')->nullable();
            $table->unsignedBigInteger('emergency_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('emergency_id')->references('id')->on('emergency_serviceds');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accept_emergency_serviceds');
    }
}
