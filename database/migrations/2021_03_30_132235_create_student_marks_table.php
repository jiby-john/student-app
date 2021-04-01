<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->index()->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('subject1')->nullable();
            $table->integer('subject2')->nullable();
            $table->integer('subject3')->nullable();
            $table->string('term')->nullable();
            $table->integer('total_marks')->nullable();
            $table->softDeletes();
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
        Schema::table('student_marks', function($table)
        {
            $table->dropForeign('student_marks_student_id_foreign');
            $table->dropIndex('student_marks_student_id_index');
            $table->dropColumn('student_id');
        });
        Schema::dropIfExists('student_marks');
    }
}
