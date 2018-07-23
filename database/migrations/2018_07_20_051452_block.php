<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Block extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->boolean('status')->default('1');
            $table->string('animation')->nullable();
            $table->text('detail')->nullable();
            $table->text('quote')->nullable();
            $table->integer('content_id')->unsigned();
            $table->foreign('content_id')->references('id')->on('content')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('block');
    }
}
