<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriterionSubcompetence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterion_subcompetence', function(Blueprint $table){
            $table->id();
            $table->foreignId('criterion_id')->references('id')->on('criteria')->cascadeOnDelete();
            $table->foreignId('subcompetence_id')->references('id')->on('subcompetences')->cascadeOnDelete();
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
        Schema::dropIfExists('criterion_subcompetence');
    }
}
