<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGltransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gltransactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->text('remarks');
            $table->decimal('amount',20,2)->default(0);
            $table->date('jtdate');
            $table->string('trancode');
            $table->string('trantype');
            $table->char('transign',1);
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
        Schema::dropIfExists('gltransactions');
    }
}
