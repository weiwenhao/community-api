<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->text('content')->nullable();
            $table->string('cover')->nullable();
            $table->unsignedInteger('comment_count');
            $table->unsignedInteger('like_count');
            $table->unsignedInteger('read_count');
            $table->unsignedInteger('word_count');
            $table->unsignedInteger('give_count');

            $table->unsignedInteger('user_id')->index();

            $table->timestamp('published_at')->nullable();
            $table->timestamp('commented_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
