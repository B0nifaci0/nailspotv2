<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompetenceCriterionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_criterion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competence_id')->references('id')->on('competences')->cascadeOnDelete();
            $table->foreignId('criterion_id')->references('id')->on('criteria')->cascadeOnDelete();
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
        Schema::dropIfExists('competence_criterion');
    }
}
