<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('preferredname');
            $table->string('lastname');
            $table->string('gender');
            $table->date('dob');
            $table->string('origin');
            $table->string('siblings_attended');
            $table->string('siblings_attended_years');
            $table->string('sibling1_name');
            $table->string('sibling1_age');
            $table->string('sibling1_school');
            $table->string('sibling2_name');
            $table->string('sibling2_age');
            $table->string('sibling2_school');
            $table->string('sibling3_name');
            $table->string('sibling3_age');
            $table->string('sibling3_school');
            $table->string('email');
            $table->string('current_school');
            $table->string('address');
            $table->integer('user_id');
            $table->string('level');
            $table->integer('student_id');
            $table->string('phonenumber');
            $table->string('position_in_family');
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
        Schema::dropIfExists('students');
    }
}
