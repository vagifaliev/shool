<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImsiCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imsiTables', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('imsi');
            $table->unsignedBigInteger('imei');
            $table->integer('number')->unsigned();
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
        Schema::dropIfExists('imsiTables');
    }
}
