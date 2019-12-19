<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRopasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ropasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lastguess')->nullable();
            $table->text('lastone')->nullable();
            $table->text('lasttwo')->nullable();
            $table->text('lastthree')->nullable();
            $table->text('allguesses')->nullable();
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
        Schema::dropIfExists('ropasis');
    }
}
