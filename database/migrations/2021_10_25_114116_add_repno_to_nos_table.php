<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRepnoToNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nos', function (Blueprint $table) {
            $table->string('repref')->default('RP');
            $table->bigInteger('repno')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nos', function (Blueprint $table) {
            $table->dropColumn('repref');
            $table->dropColumn('repno');
        });
    }
}