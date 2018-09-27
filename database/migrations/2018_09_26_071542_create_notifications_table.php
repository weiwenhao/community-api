<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action');
            $table->json('anchor')->comment('{href: "/posts/aaa", text: "文章标题"}');
            $table->json('content')->comment('{call_user: {id: 123, nickname: "bbb"},  text: "我是评论或者回复的内容共"}');
            $table->unsignedInteger('sender_id')->index();
            $table->unsignedInteger('receiver_id')->index();
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
        Schema::dropIfExists('notifications');
    }
}
