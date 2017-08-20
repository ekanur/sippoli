<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',45);
            $table->string('deskripsi',200)->nullable();
            $table->integer('jangka_durasi');
            $table->integer('pelatih_id');
            $table->date('mulai_program');
            $table->date('berakhir_program');
            $table->string('siklus_makro', 300);
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
        Schema::dropIfExists('table_program');
    }
}
