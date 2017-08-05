<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableListMakanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_makanan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',45);
            $table->string('kandungan_gizi',550);
            $table->integer('kategori');
            $table->integer('pelatih_id');
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
        Schema::dropIfExists('table_list_makanan');
    }
}
