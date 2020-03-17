<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKejadianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kejadian', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_kejadian')->unique();
            $table->string('pelapor');
            $table->text('lokasi');
            $table->string('telpon')->nullable();
            $table->string('nama_korban');
            $table->enum('jenis_kelamin',['PRIA'],['WANITA']);
            $table->integer('umur')->unsigned()->default(0);
            $table->enum('jamkes',['UMUM'],['BPJS']);
            $table->float('no_jamkes')->unsigned()->default(0);
            $table->string('kategori');
            $table->enum('triage',['M'],['K'],['H'],['HT']);
            $table->string('diagnosa')->nullable();
            $table->text('kejadian_keluhan')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('triase',['1'],['2'],['3']);
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
        Schema::dropIfExists('kejadian');
    }
}
