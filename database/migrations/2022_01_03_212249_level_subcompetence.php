<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LevelSubcompetence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_subcompetence', function(Blueprint $table){
            $table->id();
            $table->foreignId('level_id')->references('id')->on('levels')->cascadeOnDelete();
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
        Schema::dropIfExists('level_subcompetence');
    }
}
