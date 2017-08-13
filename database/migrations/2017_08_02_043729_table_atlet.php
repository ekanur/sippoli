<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableAtlet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',45);
            $table->string('gender',2);
            $table->date('tgl_lahir');
            $table->string('status',45);
            $table->integer('cabor_id');
            $table->integer('pelatih_id');
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
        Schema::dropIfExists('table_atlet');
    }
}
