<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level', function (Blueprint $table) {
            $table->increments('levelID');
            $table->string('levelName', 50);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::enableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->increments('userID');
            // $table->primary('userID');
            $table->unsignedInteger('level_LevelID');
            $table->foreign('level_LevelID')->references('LevelID')->on('level');
            $table->unsignedInteger('branch_idBranch');
            // $table->foreign('branch_idBranch')->references('idBranch')->on('branch');
            $table->string('Uprefix', 10);
            $table->string('UFName', 100);
            $table->string('ULName', 100);
            $table->string('Username', 50);
            $table->string('Title', 10)->nullable();
            $table->string('Password', 50)->nullable();
            $table->string('userCode', 10)->nullable();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('news', function (Blueprint $table) {
            $table->increments('idnews');
            $table->string('topic', 500);
            $table->text('content');
            $table->date('dateupdate');
            $table->binary('pic')->nullable();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('document', function (Blueprint $table) {
            $table->increments('doc_id');
            $table->string('name', 500);
            $table->string('file', 500);
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('news');
        Schema::dropIfExists('level');
    }
}
