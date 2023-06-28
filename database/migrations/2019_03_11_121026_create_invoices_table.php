<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invno')->unique();
            $table->date('invdate');
            $table->string('clcode');
            $table->decimal('amount',20,2)->default(0);
            $table->decimal('amount_paid',20,2)->default(0);
            $table->decimal('vat',20,2)->default(0);
            $table->decimal('discount',20,2)->default(0);
            $table->decimal('discrate',10,2)->default(0);
            $table->integer('status')->default(0);
            $table->string('location');
            $table->string('source');
            $table->string('staff');
            $table->string('lpo')->nullable();
            $table->string('terms')->default("TERMS 30");
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
        Schema::dropIfExists('invoices');
    }
}
