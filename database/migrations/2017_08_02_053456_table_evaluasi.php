<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableEvaluasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('tanggal');
            $table->integer('atlet_id');
            // $table->integer('berat_badan');
            // $table->integer('tinggi_badan');
            // $table->string('kategori');
            $table->string('data_evaluasi', 550);
            $table->string('kategori',45);
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
        Schema::dropIfExists('evaluasi');
    }
}
