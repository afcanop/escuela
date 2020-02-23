<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuialification extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quialifications', function (Blueprint $table) {
			$table->string('id');
			$table->integer('course_id')->unsigned();
			$table->integer('lesson_id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->integer('qualificationValue');
			$table->boolean('enableRecovery');
			$table->timestamps();
			$table->foreign('course_id')->references('id')->on('courses');
			$table->foreign('lesson_id')->references('id')->on('lessons');
			$table->foreign('student_id')->references('id')->on('students');
		});   
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quialifications');
	}
}
