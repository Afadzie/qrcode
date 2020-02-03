<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateqrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('createqrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname')->default();
            $table->string('lastname')->default();
            $table->string('idnumber')->default();
            $table->string('qrcodeurl')->nullable();
            $table->string('qrcodename')->nullable();
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
        Schema::dropIfExists('createqrs');
    }
}
