<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_post', function (Blueprint $table) {
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('collection_id');

            $table->timestamp('passed_at')->nullable()->comment('审核通过时间');

            $table->timestamps();

            $table->index('post_id');
            $table->index('collection_id');

            $table->unique(['post_id', 'collection_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_post');
    }
}
