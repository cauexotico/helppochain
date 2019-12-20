<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('blockchain_id');
            $table->integer('nonce');
            $table->json('data');
            $table->char('previous_hash', 64);
            $table->char('hash', 64);
            $table->timestamps();

            $table->foreign('blockchain_id')->references('id')->on('blockchains');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blocks');
    }
}
