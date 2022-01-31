<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubcompetenceUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcompetence_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competence_id')->references('id')->on('competences')->cascadeOnDelete();
            $table->foreignId('subcompetence_id')->references('id')->on('subcompetences')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('level_id')->references('id')->on('levels')->cascadeOnDelete();
            $table->string('participant_code')->nullable();
            $table->double('price')->nullable();
            $table->enum('status', [1, 2, 3])->default(1);
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
        Schema::dropIfExists('subcompetence_user');
    }
}
