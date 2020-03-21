<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        return;
        Schema::table('driver', function (Blueprint $table) {
            $table->integer("puskesmas_id")->unsigned()->unique();

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
        //
        Schema::table('driver', function (Blueprint $table) {
            $table->dropColumn("puskesmas_id");
        });
    }
}
