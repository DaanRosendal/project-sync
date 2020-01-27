<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclaratieKostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaratie_kost', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('declaratie_id');
            $table->unsignedBigInteger('kost_id');
            $table->float('bedrag', 8, 2);
            $table->timestamps();

            $table->unique(['declaratie_id', 'kost_id']);

            $table->foreign('declaratie_id')->references('id')->on('declaraties')->onDelete('cascade');
            $table->foreign('kost_id')->references('id')->on('kosten')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('declaratie_kost');
    }
}
