<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refno')->unique();
            $table->date('trandate');
            $table->string('lpo');
            $table->string('location');
            $table->string('sno');
            $table->integer('trantype')->default(0);
            $table->integer('pmode')->default(0);
            $table->decimal('vat',20,2)->default(0);
            $table->decimal('total',20,2)->default(0);
            $table->integer('qty')->default(0);
            $table->integer('status')->default(0);
            $table->text('remarks');
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
        Schema::dropIfExists('grn');
    }
}
