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
            $table->enum('kategori', ['karbohidrat', 'protein', 'lemak', 'vitamin', 'mineral', 'air']);
            $table->integer('pelatih_id');
            $table->float('kalori');
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
        Schema::dropIfExists('list_makanan');
    }
}
