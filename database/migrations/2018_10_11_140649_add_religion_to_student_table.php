<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReligionToStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('religion')->nullable();

        });

        // Modify parents table and add 'full_name' column
        Schema::table('parents', function (Blueprint $table) {
            $table->string('full_name')->nullable();

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
            $table->dropColumn('religion');
        });

        Schema::table('parents', function (Blueprint $table) {
            $table->dropColumn('full_name');

        });
    }
}
