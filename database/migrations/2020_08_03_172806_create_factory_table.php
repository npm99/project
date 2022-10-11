<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('courseName', 100);
            $table->increments('courseNumber');
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });

        Schema::create('factory', function (Blueprint $table) {
            $table->increments('idfactory');
            $table->string('factoryName', 100);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });

        Schema::enableForeignKeyConstraints();
        Schema::create('branch', function (Blueprint $table) {
            $table->increments('idBranch');
            $table->unsignedInteger('factory_idfactory');
            // $table->foreign('factory_idfactory')->references('idfactory')->on('factory');
            $table->string('branchName', 100);
            $table->string('branchcode', 100)->nullable();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('groupstudy', function (Blueprint $table) {
            $table->increments('groupID');
            $table->string('groupname', 500);
            $table->unsignedInteger('course_id')->nullable();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('Year', function (Blueprint $table) {
            $table->increments('idYear');
            $table->string('Year', 100);
            $table->string('term', 100);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('subject', function (Blueprint $table) {
            $table->increments('idsubject');
            $table->string('subjectCode', 100);
            //$table->primary('subjectCode');
            $table->string('ENsubject', 100);
            $table->string('THsubject', 100);
            $table->string('cradit', 100);
            $table->string('subNumber', 5);
            $table->unsignedInteger('group_idgroup');
            // $table->foreign('group_idgroup')->references('groupID')->on('groupstudy');
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
        Schema::dropIfExists('course');
        Schema::dropIfExists('branch');
        Schema::dropIfExists('subject');
        Schema::dropIfExists('Year');
        Schema::dropIfExists('groupstudy');
        Schema::dropIfExists('factory');

    }
}
