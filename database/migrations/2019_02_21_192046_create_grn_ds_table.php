<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrnDsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    //     Schema::create('grn_d', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('refno');
    //         $table->string('icode');
    //         $table->string('pu');
    //         $table->integer('qty')->DEFAULT(0);
    //         $table->decimal('uprice',20,2)->DEFAULT(0);
    //         $table->decimal('vat',20,2)->DEFAULT(0);
    //         $table->decimal('total',20,2)->DEFAULT(0);
    //         $table->integer('vatable')->DEFAULT(0);
    //         $table->string('remarks');
    //         $table->timestamps();
    //     });
    // 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('grn_d');
    }
}