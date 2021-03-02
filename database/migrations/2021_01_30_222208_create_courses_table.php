<?php

use App\Models\Course;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('url');
            $table->string('iframe');
            $table->enum('status', [Course::BORRADOR, Course::REVISION, Course::PUBLICADO])->default(Course::BORRADOR);
            $table->string('slug');
            $table->double('price');
            // $table->date('start_date');
            // $table->date('end_date');
            $table->text('certificate_photo_path')->nullable();
            $table->foreignId('level_id')->references('id')->on('levels')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete();
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
        Schema::dropIfExists('courses');
    }
}
