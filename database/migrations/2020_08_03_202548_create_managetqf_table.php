<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagetqfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tqf3', function (Blueprint $table) {
            $table->increments('tqf3ID');
            $table->unsignedInteger('Year_idYear');
            // $table->unsignedInteger('course_id')->nullable();
            $table->unsignedInteger('subject_idSubject');
            // $table->foreign('subject_idSubject')->references('idsubject')->on('subject');
            // $table->foreign('Year_idYear')->references('idYear')->on('Year');
            // $table->foreign('user_userID')->references('userID')->on('user');
            $table->string('filetqf3', 100)->nullable();
            $table->date('deadline')->nullable();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('tqf5', function (Blueprint $table) {
            $table->increments('tqf5ID');
            $table->unsignedInteger('Year_idYear');
            // $table->unsignedInteger('course_id')->nullable();
            $table->unsignedInteger('subject_idSubject');
            // $table->foreign('subject_idSubject')->references('idsubject')->on('subject');
            // $table->foreign('Year_idYear')->references('idYear')->on('Year');
            // $table->foreign('user_userID')->references('userID')->on('user');
            $table->string('filetqf5', 100)->nullable();
            $table->date('deadline')->nullable();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('user_tqf3', function (Blueprint $table) {
            $table->unsignedInteger('tqf3ID');
            $table->unsignedInteger('userID');
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('user_tqf5', function (Blueprint $table) {
            $table->unsignedInteger('tqf5ID');
            $table->unsignedInteger('userID');
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });

    }
    public $timestamps = false;
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tqf3');
        Schema::dropIfExists('tqf5');
        Schema::dropIfExists('user_tqf3');
        Schema::dropIfExists('user_tqf5');
    }
}
