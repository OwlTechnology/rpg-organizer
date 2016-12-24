<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccountTypeColumnToUsers extends Migration
{
    /**
     * Run the migrations; adds the 'account_type' column to the users table so
     * that certain users can have certain account types and associated
     * permissions.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->integer("account_type")->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn("account_type");
        });
    }
}
