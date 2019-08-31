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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique()->nullable();
            $table->text('image')->nullable();
            $table->string('password');
            $table->tinyInteger('active')->default(1)->unsigned();
            $table->uuid('confirmation_code')->nullable();
            $table->boolean('confirmed')->default(config('access.users.confirm_email') ? false : true);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('player_id')->nullable();
            $table->integer('status')->default(1);
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('groups')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
