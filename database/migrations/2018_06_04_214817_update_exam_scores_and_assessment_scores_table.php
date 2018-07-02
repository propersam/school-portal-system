<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class UpdateExamScoresAndAssessmentScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exam_scores', function($table) {
            $table->string('class_id')->nullable();
        });

        Schema::table('assessment_scores', function($table) {
            $table->string('class_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exam_scores', function($table) {
            $table->dropColumn('class_id');
        });

        Schema::table('assessment_scores', function($table) {
            $table->dropColumn('class_id');
        });
    }
}
