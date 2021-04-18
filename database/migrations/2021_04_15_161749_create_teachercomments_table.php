<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachercommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachercomments', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id');
            $table->string('user_id');
             $table->string('first_name');
              $table->string('last_name');
               $table->string('rating');
                $table->string('comment');
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
        Schema::dropIfExists('teachercomments');
    }
}
