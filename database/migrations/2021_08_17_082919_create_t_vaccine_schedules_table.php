<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTVaccineSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_vaccine_schedules', function (Blueprint $table) {
            $table->bigIncrements('id'); //ID
            $table->integer('schedule_id')->length(10); //スケジュールのID　外部キー(t_schedule.id)
            $table->integer('vaccine_id')->length(10); //ワクチンの種類　外部キー(m_medical.id)
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
        Schema::dropIfExists('t_vaccine_schedules');
    }
}
