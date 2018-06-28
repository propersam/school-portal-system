<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEmergencyContactTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('emergency_contacts', 'user_id'))
        {
            Schema::table('emergency_contacts', function($table) {
                $table->string('user_id');
                
            });
        }

        if (!Schema::hasColumn('emergency_contacts', 'student_id'))
        {
            Schema::table('emergency_contacts', function($table) {
                $table->string('student_id');

            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         $table->dropColumn('user_id');
         $table->dropColumn('student_id');
    }
}
