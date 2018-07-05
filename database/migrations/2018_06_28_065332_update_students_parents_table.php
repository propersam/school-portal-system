<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStudentsParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function($table) {
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->dropColumn('siblings_attended');
            $table->dropColumn('siblings_attended_years');
            $table->dropColumn('position_in_family');
            $table->dropColumn('sibling1_name');
            $table->dropColumn('sibling1_age');
            $table->dropColumn('sibling1_school');
            $table->dropColumn('sibling2_name');
            $table->dropColumn('sibling2_age');
            $table->dropColumn('sibling2_school');
            $table->dropColumn('sibling3_name');
            $table->dropColumn('sibling3_age');
            $table->dropColumn('sibling3_school');
            $table->dropColumn('current_school');
        });

        Schema::table('parents', function($table) {
            $table->dropColumn('maritalstatus');
            $table->dropColumn('attended_school');
            $table->dropColumn('occupation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function($table) {
            $table->dropColumn('state');
            $table->dropColumn('lga');
            $table->string('siblings_attended')->nullable();
            $table->string('siblings_attended_years')->nullable();
            $table->string('position_in_family')->nullable();
            $table->string('sibling1_name')->nullable();
            $table->string('sibling1_age')->nullable();
            $table->string('sibling1_school')->nullable();
            $table->string('sibling2_name')->nullable();
            $table->string('sibling2_age')->nullable();
            $table->string('sibling2_school')->nullable();
            $table->string('sibling3_name')->nullable();
            $table->string('sibling3_age')->nullable();
            $table->string('sibling3_school')->nullable();
            $table->string('current_school')->nullable();
        });

        Schema::table('parents', function($table) {
            $table->string('maritalstatus')->nullable();
            $table->string('attended_school')->nullable();
            $table->string('occupation')->nullable();
        });
    }
}
