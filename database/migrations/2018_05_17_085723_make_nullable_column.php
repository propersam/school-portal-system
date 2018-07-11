<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeNullableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('firstname')->nullable()->change();
            $table->string('preferredname')->nullable()->change();
            $table->string('lastname')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->date('dob')->nullable()->change();
            $table->string('origin')->nullable()->change();
            $table->string('siblings_attended')->nullable()->change();
            $table->string('siblings_attended_years')->nullable()->change();
            $table->string('sibling1_name')->nullable()->change();
            $table->string('sibling1_age')->nullable()->change();
            $table->string('sibling1_school')->nullable()->change();
            $table->string('sibling2_name')->nullable()->change();
            $table->string('sibling2_age')->nullable()->change();
            $table->string('sibling2_school')->nullable()->change();
            $table->string('sibling3_name')->nullable()->change();
            $table->string('sibling3_age')->nullable()->change();
            $table->string('sibling3_school')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('current_school')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->integer('user_id')->nullable()->change();
            $table->string('level')->nullable()->change();
            $table->integer('student_id')->nullable()->change();
            $table->string('phonenumber')->nullable()->change();
            $table->string('position_in_family')->nullable()->change();
        });

        Schema::table('parents', function (Blueprint $table) {
            $table->string('firstname')->nullable()->change();
            $table->string('lastname')->nullable()->change();
            $table->string('maritalstatus')->nullable()->change();
            $table->string('occupation')->nullable()->change();
            $table->string('companyname')->nullable()->change();
            $table->string('workaddress')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('attended_school')->nullable()->change();
            $table->integer('user_id')->nullable()->change();
            $table->integer('student_id')->nullable()->change();
            $table->string('phonenumber')->nullable()->change();
            $table->string('parent_type')->nullable()->change();
        });

        // Schema::table('emergency_contact', function (Blueprint $table) {
        //     $table->string('name')->nullable()->change();
        //     $table->string('home_number')->nullable()->change();
        //     $table->string('work_number')->nullable()->change();
        //     $table->string('cell_number')->nullable()->change();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
