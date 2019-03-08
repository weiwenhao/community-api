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
            $table->increments('id');
            $table->string('nickname');
            $table->string('avatar');
            $table->string('email');
            $table->string('phone_number');
            $table->string('password');

            $table->unsignedInteger('follow_count')->default(0);
            $table->unsignedInteger('fans_count')->default(0);
            $table->unsignedInteger('post_count')->default(0);
            $table->unsignedInteger('word_count')->default(0);
            $table->unsignedInteger('like_count')->default(0);

            $table->json('oauth')->nullable();

//            $table->string('google_id')->nullable()->unique()->virtualAs('`oauth`->>"$.google_id"');
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
        Schema::dropIfExists('users');
    }
}
