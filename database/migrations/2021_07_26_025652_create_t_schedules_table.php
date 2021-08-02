<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_schedules', function (Blueprint $table) {
            $table->bigIncrements('id'); //ID
            $table->integer('child_id')->length(10); //こどものID 外部キー(t_children.id)
            $table->date('date'); //日にち
            $table->integer('vaccine_flag')->length(1)->default(0); //ワクチンの有無
            $table->integer('vaccine_id')->length(10); //ワクチンの種類　外部キー(m_vaccine.id)
            $table->integer('medical_flag')->length(1)->default(0); //健診の有無
            $table->integer('medical_id')->length(10); //健診の種類　外部キー(m_medical.id)
            $table->time('start_time'); //開始時間
            $table->string('schedule_memo',256)->nullable(); //メモ
            $table->softDeletes(); //論理削除
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_schedules');
    }
}
