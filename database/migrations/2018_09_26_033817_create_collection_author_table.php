<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_author', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('collection_id');
            $table->timestamps();

            $table->index('user_id');
            $table->index('collection_id');

            $table->unique(['user_id', 'collection_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_author');
    }
}
