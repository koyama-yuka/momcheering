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
    public function up()
    {
        Schema::create('t_user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id'); //ID
            $table->string('user_name', 256); //ユーザー名
            $table->integer('relationship_id')->length(1); //関係性
            $table->integer('notice_flag')->length(1)->default(1); //通知
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
        Schema::dropIfExists('t_user_profiles');
    }
}
