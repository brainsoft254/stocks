<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refno')->unique();
            $table->date('trandate');
            $table->string('clcode');
            $table->string('description');
            $table->string('location');
            $table->decimal('total',20,2);
            $table->decimal('tax',20,2);
            $table->decimal('disc',20,2)->default(0);
            $table->decimal('discrate',10,2)->default(0);
            $table->integer('status')->default(0);
            $table->string('invno')->nullable();
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
        Schema::dropIfExists('orders');
    }
}


