<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestSpecialistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_specialist_accept_request', function (Blueprint $table) {
            $table->integer('request_specialist_id')->unsigned();

            $table->integer('accept_request_id')->unsigned();

            $table->foreign('request_specialist_id')->references('id')->on('request_specialists')
                ->onDelete('cascade');

            $table->foreign('accept_request_id')->references('id')->on('accept_requests')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_specialists');
    }
}
