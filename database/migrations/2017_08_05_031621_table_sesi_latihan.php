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
            $table->integer('siklus_mikro_id');
            $table->string('tahapan',45);
            $table->string('json_materi_latihan',555);
            $table->string('json_intesitas_max',45);
            $table->string('json_volume_max',45);
            $table->enum('kriteria_volume_intensitas', array('rendah','sedang','berat'));
            $table->date("tanggal");
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
