<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');    
            $table->integer('user_id')->unsigned();
            $table->integer('plan_id')->nullable();
            
            $table->string('slug')->unique();
            $table->string('title')->unique();
            $table->string('description', 255);
            $table->string('live_url')->nullable();
            $table->string('source_url')->nullable();

            $table->string('image_url')->nullable();
            // Temporary image URL, to be replaced by Album/Image set.

            $table->boolean('deleted')->default(false);

            $table->dateTime('began')->nullable();
            $table->dateTime('ended')->nullable();

            $table->enum('status', config('site')['PROJECT_STATUSES']);

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('projects');
    }
}
