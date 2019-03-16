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

            $table->string('cover')->nullable();
            $table->string('description')->nullable();

            $table->text('content')->nullable();
            $table->unsignedInteger('comment_count')->default(0);
            $table->unsignedInteger('like_count')->default(0);
            $table->unsignedInteger('read_count')->default(0);
            $table->unsignedInteger('word_count')->default(0);
            $table->unsignedInteger('give_count')->default(0)->comment('赞赏数量');

            $table->unsignedInteger('user_id')->index();

            $table->timestamp('published_at')->nullable()->comment('发布时间');
            $table->timestamp('selected_at')->nullable()->comment('是否精选/精选时间');
            $table->timestamp('commented_at')->nullable()->comment('评论时间');

            $table->integer('heat')->default(0)->index()->comment('热度');

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
