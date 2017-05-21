<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add my custom users table columns
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('updated_details')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop column
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('updated_details');
        });
    }
}
