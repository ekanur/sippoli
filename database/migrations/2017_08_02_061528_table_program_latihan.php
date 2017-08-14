<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableProgramLatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_latihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sesi_latihan_id');
            $table->integer('list_latihan_id');
            $table->string('volume',45);
            $table->string('intesitas',45);
            $table->string('waktu',15);
            $table->enum('jenis_latihan',array('pemanasan','inti','pendinginan'));
            $table->softDeletes();
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
        Schema::dropIfExists('table_program_latihan');
    }
}
