<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTqf5Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tqf5_1', function (Blueprint $table) {
            $table->unsignedInteger('tqf5_tqf5ID');
            $table->primary('tqf5_tqf5ID');
            // $table->foreign('tqf5_tqf5ID')->references('tqf5ID')->on('tqf5');
            $table->string('THname', 500);
            $table->string('ENname', 500);
            $table->string('pre_req', 500);
            $table->text('teacher');
            $table->text('term');
            $table->text('place');
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('tqf5_2', function (Blueprint $table) {
            $table->unsignedInteger('tqf5_tqf5ID');
            $table->primary('tqf5_tqf5ID');
            // $table->foreign('tqf5_tqf5ID')->references('tqf5ID')->on('tqf5');
            $table->text('data1_1')->nullable();
            $table->text('data1_2')->nullable();
            $table->text('data2_1');
            $table->text('data2_2');
            $table->text('data2_3');
            $table->text('data4');
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        // Schema::create('tqf5_2_1', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('tqf5_tqf5ID');
        //     // $table->foreign('tqf5_tqf5ID')->references('tqf5ID')->on('tqf5');
        //     $table->text('detail');
        //     $table->integer('hour1');
        //     $table->integer('hour2');
        //     $table->text('reason');
        //     $table->string('status', 5);
        //     $table->charset = 'utf8';
        //     $table->collation = 'utf8_general_ci';
        //     $table->engine = 'InnoDB';

        // });
        // Schema::create('tqf5_2_2', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('tqf5_tqf5ID');
        //     // $table->foreign('tqf5_tqf5ID')->references('tqf5ID')->on('tqf5');
        //     $table->text('learn_outcome');
        //     $table->text('description');
        //     $table->text('effect');
        //     $table->text('problem');
        //     $table->string('status', 5);
        //     $table->charset = 'utf8';
        //     $table->collation = 'utf8_general_ci';
        //     $table->engine = 'InnoDB';
        // });
        Schema::create('tqf5_3', function (Blueprint $table) {
            $table->unsignedInteger('tqf5_tqf5ID');
            $table->primary('tqf5_tqf5ID');
            // $table->foreign('tqf5_tqf5ID')->references('tqf5ID')->on('tqf5');
            $table->integer('num_regis');
            $table->integer('num_end');
            $table->integer('num_w');
            $table->string('detail5', 500);
            $table->string('detail6_1', 500);
            $table->string('detail6_2', 500);
            $table->string('detail7', 500);
            $table->text('grade')->nullable();
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('tqf5_4', function (Blueprint $table) {
            $table->unsignedInteger('tqf5_tqf5ID');
            $table->primary('tqf5_tqf5ID');
            // $table->foreign('tqf5_tqf5ID')->references('tqf5ID')->on('tqf5');
            $table->string('detail1_1', 500);
            $table->string('detail1_2', 500);
            $table->string('detail2_1', 500);
            $table->string('detail2_2', 500);
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('tqf5_5', function (Blueprint $table) {
            $table->unsignedInteger('tqf5_tqf5ID');
            $table->primary('tqf5_tqf5ID');
            // $table->foreign('tqf5_tqf5ID')->references('tqf5ID')->on('tqf5');
            $table->string('detail1_1', 500);
            $table->string('detail1_2', 500);
            $table->string('detail2_1', 500);
            $table->string('detail2_2', 500);
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('tqf5_6', function (Blueprint $table) {
            $table->unsignedInteger('tqf5_tqf5ID');
            $table->primary('tqf5_tqf5ID');
            // $table->foreign('tqf5_tqf5ID')->references('tqf5ID')->on('tqf5');
            $table->string('detail1_1', 500);
            $table->string('detail1_2', 500);
            $table->string('detail2', 500);
            $table->string('detail3_1', 500);
            $table->string('detail3_2', 500);
            $table->string('detail3_3', 500);
            $table->string('detail4', 500);
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        // Schema::create('grade', function (Blueprint $table) {
        //     $table->unsignedInteger('tqf5_3_tqf5_tqf5ID');
        //     $table->foreign('tqf5_3_tqf5_tqf5ID')->references('tqf5_tqf5ID')->on('tqf5_3');
        //     $table->string('grade', 50);
        //     $table->integer('count');
        //     $table->string('percent', 50);
        //     $table->string('grade2', 50);
        //     $table->string('gid', 50);
        //     $table->charset = 'utf8';
        //     $table->collation = 'utf8_general_ci';
        //     $table->engine = 'InnoDB';
        // });
    }
    public $timestamps = false;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tqf5_1');
        Schema::dropIfExists('tqf5_2');
        // Schema::dropIfExists('tqf5_2_1');
        // Schema::dropIfExists('tqf5_2_2');
        Schema::dropIfExists('tqf5_3');
        Schema::dropIfExists('tqf5_4');
        Schema::dropIfExists('tqf5_5');
        Schema::dropIfExists('tqf5_6');
        // Schema::dropIfExists('grade');

    }
}
