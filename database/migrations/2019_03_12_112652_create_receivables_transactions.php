<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivablesTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivables_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('remarks');
            $table->decimal('amount',20,2);
            $table->date('jtdate');
            $table->string('trancode');
            $table->string('trantype');
            $table->string('transign');
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
        Schema::dropIfExists('receivables_transactions');
    }
}