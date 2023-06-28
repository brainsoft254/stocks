<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('trancode');
            $table->date('trandate');
            $table->string('transign',1);
            $table->decimal('qty',10,2)->default(1);
            $table->decimal('cost',20,2)->default(0);
            $table->string('location');
            $table->string('source');
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
        Schema::dropIfExists('stock_trans');
    }
}
