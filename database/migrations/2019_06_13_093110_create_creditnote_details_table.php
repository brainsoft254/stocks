<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditnoteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditnote_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refno');
            $table->string('invno');
            $table->string('invdate');
            $table->decimal('invamnt',20,2)->default(0);
            $table->decimal('cramnt',20,2)->default(0);
            $table->string('rmks');
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
        Schema::dropIfExists('creditnote_details');
    }
}
