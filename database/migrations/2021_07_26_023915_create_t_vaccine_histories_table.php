<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTVaccineHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_vaccine_histories', function (Blueprint $table) {
            $table->bigIncrements('id'); //ID
            $table->integer('check_id')->length(10); //完了チェックのID 外部キー(t_check.id)
            $table->date('inoculation_date')->nullable(); //接種日
            $table->string('hospital',256)->nullable(); //医療機関名
            $table->string('vaccine_memo',256)->nullable(); //メモ
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
        Schema::dropIfExists('t_vaccine_histories');
    }
}
