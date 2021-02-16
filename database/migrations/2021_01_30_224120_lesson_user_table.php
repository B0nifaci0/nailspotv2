<?php

use App\Models\Lesson;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LessonUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_user', function (Blueprint $table) {
            $table->string('url');
            $table->enum('status', [Lesson::ENTREGADA, Lesson::CALIFICADA])->default(Lesson::ENTREGADA);
            $table->integer('score')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('lesson_id')->references('id')->on('lessons')->cascadeOnDelete();
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
        Schema::dropIfExists('lesson_user');
    }
}
