<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_children', function (Blueprint $table) {
            $table->bigIncrements('id'); //ID
            $table->integer('user_id')->length(10); //外部キー(t_user.id)
            $table->string('child_name',256); //こどもの名前
            $table->integer('gender_id')->length(1); //性別　外部キー(m_gender.id)
            $table->date('birthday'); //生年月日
            $table->integer('blood_type_id')->length(1); //血液型　外部キー(m_bloodtype.id)
            $table->integer('blood_rh_id')->length(1); //Rh　外部キー(m_blood_rh.id)
            $table->integer('birth_weight')->length(10); //出生体重
            $table->integer('birth_height')->length(10); //出生身長
            $table->string('allergy',256); //アレルギー
            $table->string('sick',256); //主な病気
            $table->string('child_memo',256); //メモ
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
        Schema::dropIfExists('t_children');
    }
}
