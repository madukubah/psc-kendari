<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateKejadianTable extends Migration
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
        Schema::table('kejadian', function (Blueprint $table) {
            // $table->integer("puskesmas_id")->unsigned()->nullable();
            // $table->integer("rumkit_id")->unsigned()->nullable();
            // $table->integer("ambulans_id")->unsigned();
            // $table->integer("driver_id")->unsigned();

            $table->foreign("puskesmas_id")->references("id")->on("puskesmas");
            $table->foreign("rumkit_id")->references("id")->on("rumkit");
            $table->foreign("ambulans_id")->references("id")->on("ambulans");
            $table->foreign("driver_id")->references("id")->on("driver");
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
        Schema::table('kejadian', function (Blueprint $table) {
            $table->dropForeign("puskesmas_id");
            $table->dropForeign("rumkit_id");
            $table->dropForeign("ambulans_id");
            $table->dropForeign("driver_id");
            $table->dropColumn("puskesmas_id");
            $table->dropColumn("rumkit_id");
            $table->dropColumn("ambulans_id");
            $table->dropColumn("driver_id");
        });
        Schema::dropIfExists('kejadian');
    }
}
