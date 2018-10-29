<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('screen_name', 50)->nullable();
            $table->string('photo', 255)->nullable();
            $table->unsignedBigInteger('vk_id')->nullable();
            $table->string('referal_reference', 255);
            $table->unsignedInteger('referal_id');
            $table->foreign('referal_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
        Schema::table('users', function ($table) {
            $table->dropForeign('posts_user_id_foreign');
        });
        Schema::dropIfExists('users');
    }
}
