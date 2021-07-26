<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_vaccines', function (Blueprint $table) {
            $table->bigIncrements('id'); //ID
            $table->string('vaccine_name',256); //ワクチン名
            $table->integer('vaccine_times')->length(10); //回数
            $table->integer('display_order')->length(10); //表示順
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
        Schema::dropIfExists('m_vaccines');
    }
}
