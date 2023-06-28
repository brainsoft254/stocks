<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refno');
            $table->string('payee');
            $table->string('pinno');
            $table->string('docno');
            $table->date('trandate');
            $table->decimal('amount',20,2)->default(0);
            $table->string('cheque');
            $table->string('account');
            $table->string('ptype');
            $table->string('remarks');
            $table->string('staff');
            $table->integer('status')->default(0);
            $table->string('inwords');
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
        Schema::dropIfExists('payments');
    }
}
