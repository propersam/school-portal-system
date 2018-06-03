<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('maritalstatus');
            $table->string('occupation');
            $table->string('companyname');
            $table->string('workaddress');
            $table->string('phone');
            $table->string('email');
            $table->string('attended_school');
            $table->integer('user_id');
            $table->integer('student_id');
            $table->string('phonenumber');
            $table->string('parent_type');
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
        Schema::dropIfExists('parents');
    }
}
