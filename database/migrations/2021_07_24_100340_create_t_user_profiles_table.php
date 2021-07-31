<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     
     //このmigrationファイルは使わないものになるかな…usersとガッチャンコ予定で
    //public function up()
    //{
    //   Schema::create('t_user_profiles', function (Blueprint $table) {
    //        $table->bigIncrements('id'); //ID
    //        $table->integer('user_id')->length(10); //外部キー(t_user.id)
    //        $table->string('user_name', 256); //ユーザー名
    //        $table->integer('relationship_id')->length(1); //関係性 外部キー
    //        $table->integer('notice_flag')->length(1)->default(1); //通知
    //        $table->softDeletes(); //論理削除
    //        $table->timestamps();
    //    });
    //}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_user_profiles');
    }
}
