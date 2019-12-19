<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('lastone')->nullable();
            $table->text('lasttwo')->nullable();
            $table->text('lastthree')->nullable();
            $table->text('allguesses')->nullable();
            $table->integer('nexthumanmove')->nullable();
            $table->tinyInteger('winner')->nullable();
            $table->unsignedBigInteger('ropasi_id');
            $table->foreign('ropasi_id')->references('id')->on('ropasis');
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
        Schema::dropIfExists('results');
    }
}
