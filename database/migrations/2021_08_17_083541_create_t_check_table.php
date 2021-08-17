<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_check', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('child_id')->length(10); //こどものID 外部キー(t_children.id)
            $table->integer('vaccine_id')->length(10); //ワクチンのID 外部キー(m_vaccine.id)
            $table->integer('done_check')->length(1)->default(0); //完了チェック
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
        Schema::dropIfExists('t_check');
    }
}
