<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BalansCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balansTables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('imsi_id')->default(null);
            $table->float('coin')->unsigned();
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
        Schema::dropIfExists('balansTables');
    }
}
