<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclaratieProjectkostenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaratie_projectkosten', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('declaratie_id');
            $table->unsignedBigInteger('projectkosten_id');
            $table->float('bedrag', 8, 2);
            $table->timestamps();

            $table->unique(['declaratie_id', 'projectkosten_id']);

            $table->foreign('declaratie_id')->references('id')->on('declaraties')->onDelete('cascade');
            $table->foreign('projectkosten_id')->references('id')->on('projectkosten')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('declaratie_projectkosten');
    }
}
