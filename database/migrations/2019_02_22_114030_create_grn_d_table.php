<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrnDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grn_d', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refno');
            $table->string('icode');
            $table->string('pu');
            $table->decimal('qty',20,2)->default(0);
            $table->decimal('uprice',20,2)->default(0);
            $table->decimal('vat',20,2)->default(0);
            $table->decimal('total',20,2)->default(0);
            $table->integer('vatable')->default(0);
            $table->string('remarks');
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
        Schema::dropIfExists('grn_d');
    }
}