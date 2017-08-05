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
        Schema::create('program_makanan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id');
            $table->integer('list_makanan_id');
            $table->date('tanggal');
            $table->string('waktu',15);
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
        Schema::dropIfExists('table_program_makanan');
    }
}
