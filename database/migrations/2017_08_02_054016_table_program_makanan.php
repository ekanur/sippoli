<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableProgramMakanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('program_makanan');
        Schema::create('program_makanan', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->enum('waktu', ['pagi', 'siang', 'malam']);
            $table->integer('program_id');
            $table->integer('atlet_id');
            $table->integer('list_makanan_id');
            $table->float('qty');
            $table->float('total_kalori');
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
        Schema::dropIfExists('program_makanan');
    }
}
