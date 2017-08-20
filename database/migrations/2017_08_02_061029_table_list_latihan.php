<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableListLatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_latihan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',45);
            $table->string('kategori',45);
            $table->string('deskripsi',100);
            $table->string('video', 25);
            $table->integer('pelatih_id');
            $table->integer('cabor_id');
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
        Schema::dropIfExists('list_latihan');
    }
}
