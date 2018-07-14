<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->string('phone',20)->nullable()->after('username');
            $table->dropUnique('users_email_unique');

            $table->string('email')->nullable()->change();

            $table->index('username','user_username');
            $table->index('email','user_email');
            $table->index('phone','user_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropIndex('user_phone');
            $table->dropIndex('user_email');
            $table->dropIndex('user_username');

            $table->unique('email','users_email_unique');
            $table->dropColumn('phone');
        });
    }
}
