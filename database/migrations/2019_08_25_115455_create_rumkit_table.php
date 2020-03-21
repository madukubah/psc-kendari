<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRumkitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        return;
        Schema::create('rumkit', function (Blueprint $table) {
            $table->increments('id');
            $table->string("kode_rs")->unique();
            $table->string("nama_rs");
            $table->text("alamat");
            $table->string("telpon");
            $table->string("username")->unique();
            $table->string('password');
            $table->integer("tt_kelas_vip")->nullable();
            $table->integer("tt_kelas_1")->nullable();
            $table->integer("tt_kelas_2")->nullable();
            $table->integer("tt_kelas_3")->nullable();
            $table->integer("igd")->nullable();
            $table->integer("vk")->nullable();
            $table->integer("icu")->nullable();
            $table->integer("iccu")->nullable();
            $table->integer("picu")->nullable();
            $table->integer("nicu")->nullable();
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
        Schema::dropIfExists('rumkit');
    }
}
