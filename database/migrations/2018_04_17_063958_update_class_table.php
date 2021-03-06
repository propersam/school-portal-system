<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class UpdateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('classes', function($table) {
            $table->dropColumn('level_id');
            $table->integer('term_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('classes', function($table) {
            $table->dropColumn('term_id');
            $table->integer('level_id');

        });

        
    }
}
