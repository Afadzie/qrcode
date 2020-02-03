<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewqrcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newqrcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('qrname')->default();
            $table->string('qrmsg')->default();
            $table->string('qrurl')->nullable();
            $table->string('qraction')->nullale();
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
        Schema::dropIfExists('newqrcodes');
    }
}
