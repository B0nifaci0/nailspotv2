<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNosotrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nosotros', function (Blueprint $table) {
            $table->id();
            $table->string('about_us');
            $table->string('vision');
            $table->string('mision');
            $table->string('valors');
            $table->string('what_do');
            $table->string('how_do');
            $table->string('video_identify');
            $table->string('video_exp_users');
            $table->string('video_exp_judge');
            $table->string('own_expert');
            $table->string('exp_nailspot');
            $table->string('oficio_yohana');
            $table->string('oficio_renato');
            $table->string('oficio_aron');
            $table->string('cargo_yohana');
            $table->string('cargo_renato');
            $table->string('cargo_aron');
            $table->string('pasatiempo_yohana');
            $table->string('pasatiempo_renato');
            $table->string('pasatiempo_aron')
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nosotros');
    }
}
