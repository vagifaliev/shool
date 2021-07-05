<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PortCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portTables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('imsi_id')->default(null);
            $table->foreign('imsi_id')->references('id')->on('imsiTables');
            $table->integer('port')->unsigned();
            $table->ipAddress('ipaddres');
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
        Schema::dropIfExists('portTables');
    }
}
