<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('icode');
            $table->string('idesc');
            $table->string('uom');
            $table->integer('qty');
            $table->decimal('rate',20,2)->defaut(0);
            $table->decimal('vat',20,2)->defaut(0);
            $table->decimal('total',20,2)->defaut(0);
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
        Schema::dropIfExists('return_details');
    }
}
