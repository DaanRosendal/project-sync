<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclaratiesKostenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaraties_kosten', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('declaratie_id');
            $table->unsignedBigInteger('kosten_id');
            $table->float('bedrag', 8, 2);
            $table->timestamps();

            $table->unique(['declaratie_id', 'kosten_id']);

            $table->foreign('declaratie_id')->references('id')->on('declaraties')->onDelete('cascade');
            $table->foreign('kosten_id')->references('id')->on('kosten')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('declaraties_kosten');
    }
}
