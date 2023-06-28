<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refno')->unique();
            $table->date('trandate');
            $table->string('locfrom');
            $table->string('locto');
            $table->decimal('qty',10,2)->default(0);
            $table->decimal('tax',20,2)->default(0);
            $table->decimal('total',20,2)->default(0);
            $table->integer('status')->default(0);
            $table->string('remarks');
            $table->string('staff');
            $table->integer('issued')->default(0);
            $table->string('issuedby')->nullable();
            $table->date('issuedate')->nullable();
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
        Schema::dropIfExists('requisitions');
    }
}
