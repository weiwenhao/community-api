<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->boolean('type')->comment('user/collection');
            $table->unsignedInteger('type_id')->comment('user_id or collection_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->index('collection_id');
            $table->index('user_id');

            $table->unique(['collection_id', 'user_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
