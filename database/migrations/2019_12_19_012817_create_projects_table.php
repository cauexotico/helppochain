<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('blockchain_id');
            $table->char('name', 100);
            $table->enum('type', ['solo', 'shared']);
            $table->json('whitelist');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('projects');
    }
}
