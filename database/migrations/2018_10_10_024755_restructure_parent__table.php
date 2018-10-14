<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestructureParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parents', function (Blueprint $table) {
            $table->string('origin')
                ->before('user_id')->nullable();

            $table->string('occupation')
                ->before('user_id')->nullable();

            $table->string('whatsapp_num')
                ->before('user_id')->nullable();
        });


        // fixing emergency from here
        Schema::table('emergency_contacts', function (Blueprint $table) {
           $table->string('relationship')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parents', function (Blueprint $table) {
            $table->dropColumn(['origin', 'occupation', 'whatsapp_num']);
        });

        // Readjusting emergency_contacts from here
        Schema::table('emergency_contacts', function (Blueprint $table) {
            $table->dropColumn('relationship');
        });

    }
}
