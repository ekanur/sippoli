<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSesiLatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesi_latihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id');
            $table->integer('pekan_ke');
            $table->string('tahapan',45);
            $table->string('materi_latihan',555);
            $table->integer('volume');
            $table->integer('intensitas');
            $table->string('intesitas_max',45);
            $table->string('volume_max',45);
            $table->enum('kriteria_volume_intesitas', array('rendah','sedang','berat'));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesi_latihan');
    }
}
