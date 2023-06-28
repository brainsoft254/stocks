<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditnotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditnotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refno');
            $table->date('trandate');
            $table->string('clcode');
            $table->decimal('amount',20,2)->default(0);
            $table->integer('status')->default(0);
            $table->integer('cltype')->default(0);
            $table->string('remarks');
            $table->string('location');
            $table->string('staff');
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
        Schema::dropIfExists('creditnotes');
    }
}
