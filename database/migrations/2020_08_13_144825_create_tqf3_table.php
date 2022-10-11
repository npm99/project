<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTqf3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('tqf3_1', function (Blueprint $table) {
            $table->unsignedInteger('tqf3_tqf3ID');
            $table->primary('tqf3_tqf3ID');
            // $table->foreign('tqf3_tqf3ID')->references('tqf3ID')->on('tqf3');
            $table->text('THname');
            $table->text('ENname');
            $table->string('credit', 100);
            $table->text('course');
            $table->text('teacher');
            $table->text('term');
            $table->text('Pre_requisite');
            $table->text('Co_requisite');
            $table->text('place');
            $table->text('date_modify');
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
        });
        Schema::create('tqf3_2', function (Blueprint $table) {
            $table->unsignedInteger('tqf3_tqf3ID');
            $table->primary('tqf3_tqf3ID');
            // $table->foreign('tqf3_tqf3ID')->references('tqf3ID')->on('tqf3');
            $table->text('target');
            $table->text('objective');
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';            
        });
        Schema::create('tqf3_3', function (Blueprint $table) {
            $table->unsignedInteger('tqf3_tqf3ID');
            $table->primary('tqf3_tqf3ID');
            // $table->foreign('tqf3_tqf3ID')->references('tqf3ID')->on('tqf3');
            $table->text('course_desc');
            $table->string('hour_lecture', 100);
            $table->string('houre_practice', 100);
            $table->string('hour_selhflearn', 100);
            $table->string('hour_tu', 500);
            $table->string('hour_recom', 500);
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';            
        });
        Schema::create('tqf3_4', function (Blueprint $table) {
            $table->unsignedInteger('tqf3_tqf3ID');
            $table->primary('tqf3_tqf3ID');
            // $table->foreign('tqf3_tqf3ID')->references('tqf3ID')->on('tqf3');
            $table->text('morality');
            $table->text('morality2');
            $table->text('morality3');
            $table->text('knowledge');
            $table->text('knowledge2');
            $table->text('knowledge3');
            $table->text('intel_skill');
            $table->text('intel_skill2');
            $table->text('intel_skill3');
            $table->text('respon_skill');
            $table->text('respon_skill2');
            $table->text('respon_skill3');
            $table->text('num_skill');
            $table->text('num_skill2');
            $table->text('num_skill3');
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';            
        });
        Schema::create('tqf3_5', function (Blueprint $table) {
            $table->unsignedInteger('tqf3_tqf3ID');
            $table->primary('tqf3_tqf3ID');
            // $table->foreign('tqf3_tqf3ID')->references('tqf3ID')->on('tqf3');
            $table->text('data1')->nullable();
            $table->text('data2')->nullable();
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';  
        });
        // Schema::create('tqf3_5_1', function (Blueprint $table) {
        //     $table->increments('pid');
        //     $table->unsignedInteger('tqf3_tqf3ID');
        //     // $table->primary('tqf3_tqf3ID');
        //     // $table->foreign('tqf3_tqf3ID')->references('tqf3ID')->on('tqf3');
        //     $table->string('week', 10);
        //     $table->text('content');
        //     $table->integer('hour');
        //     $table->text('intuction');
        //     $table->string('assid', 100);
        //     $table->string('status', 5);
        //     $table->charset = 'utf8';
        //     $table->collation = 'utf8_general_ci';
        //     $table->engine = 'InnoDB';  
        // });
        // Schema::create('tqf3_5_2', function (Blueprint $table) {
        //     $table->increments('nid');
        //     $table->unsignedInteger('tqf3_tqf3ID');
        //     // $table->primary('tqf3_tqf3ID');
        //     // $table->foreign('tqf3_tqf3ID')->references('tqf3ID')->on('tqf3');
        //     $table->string('no', 500);
        //     $table->string('howto', 500);
        //     $table->string('week', 500);
        //     $table->string('percent', 500);
        //     $table->string('status', 5);
        //     $table->charset = 'utf8';
        //     $table->collation = 'utf8_general_ci';
        //     $table->engine = 'InnoDB';  
        // });
        Schema::create('tqf3_6', function (Blueprint $table) {
            $table->unsignedInteger('tqf3_tqf3ID');
            $table->primary('tqf3_tqf3ID');
            // $table->foreign('tqf3_tqf3ID')->references('tqf3ID')->on('tqf3');
            $table->text('detail1');
            $table->text('detail2');
            $table->text('detail3');
            $table->string('status', 5);
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';  
        });
        Schema::create('tqf3_7', function (Blueprint $table) {
            $table->unsignedInteger('tqf3_tqf3ID');
            $table->primary('tqf3_tqf3ID');
            // $table->foreign('tqf3_tqf3ID')->references('tqf3ID')->on('tqf3');
            $table->text('detail1');
            $table->text('detail2');
            $table->text('detail3');
            $table->text('detail4');
            $table->text('detail5');
            $table->string('status', 5);
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
        Schema::dropIfExists('tqf3_1');
        Schema::dropIfExists('tqf3_2');
        Schema::dropIfExists('tqf3_3');
        Schema::dropIfExists('tqf3_4');
        Schema::dropIfExists('tqf3_5');
        // Schema::dropIfExists('tqf3_5_1');
        // Schema::dropIfExists('tqf3_5_2');
        Schema::dropIfExists('tqf3_6');
        Schema::dropIfExists('tqf3_7');
    }
}
