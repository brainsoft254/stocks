<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDnoToNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nos', function (Blueprint $table) {
            $table->bigInteger('dno')->default(1);
            $table->string('dnopref')->default('DNO');
            $table->integer('auto')->default(1);
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
            $table->dropColumn(['dno','dnopref','auto']);
        });
    }
}
