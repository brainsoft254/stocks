<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('refno')->unique();
            $table->date('trandate');
            $table->string('clcode');
            $table->decimal('amount',20,2)->default(0);
            $table->decimal('vat',20,2)->default(0);
            $table->integer('status')->default(0);
            $table->integer('cltype')->default(0);
            $table->string('invno');
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
        Schema::dropIfExists('returns');
    }
}
