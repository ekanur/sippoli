<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiklusMikro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siklus_mikro', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id');
            $table->string('json_volume_intensitas');
            $table->integer('pekan_ke');
            $table->timestamps();
            $table->softDeletes();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siklus_mikro');
    }
}
