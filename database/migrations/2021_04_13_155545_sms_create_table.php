<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SmsCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smsTables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('imsi_id')->default(null);
            $table->foreign('imsi_id')->references('id')->on('imsiTables');
            $table->text('text');
            $table->string('statusInOut', 100);
            $table->integer('numberSendSms')->unsigned();
            $table->timestamp('time_recivie');
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
        Schema::dropIfExists('smsTables');
    }
}
