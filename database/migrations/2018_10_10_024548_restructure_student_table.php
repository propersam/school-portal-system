<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestructureStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
           $table->string('middle_name')
               ->before('last_name')->nullable();

           $table->string('blood_group',7)
               ->before('user_id')->nullable();

           $table->string('genotype',7)
                ->before('user_id')->nullable();

            $table->string('nationality')
                ->before('user_id')->nullable();

            $table->string('mother_tongue')
                ->before('user_id')->nullable();

            $table->string('other_languages')
                ->before('user_id')->nullable();

            $table->text('health_challenges')
                ->before('user_id')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['middle_name', 'blood_group',
                'genotype','nationality', 'mother_tongue',
                'other_languages', 'health_challenges']);
        });
    }
}
