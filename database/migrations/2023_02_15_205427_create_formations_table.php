<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referentiel_id');
            $table->foreign('referentiel_id')->references('id')->on('referentiels')->onDelete('cascade'); 
            $table->string('nomForma');
            $table->string('duree');
            $table->string('description');
            $table->string('isStarted');
            $table->date('dateDebut');
          //  $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations');
    }
};
