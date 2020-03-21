<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAmbulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ambulans', function (Blueprint $table) {
            $table->integer("puskesmas_id")->unsigned();

            $table->foreign("puskesmas_id")->references("id")->on("puskesmas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ambulans', function (Blueprint $table) {
            $table->dropColumn("puskesmas_id");
        });
    }
}
