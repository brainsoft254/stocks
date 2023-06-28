<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->string('pobox');
            $table->string('tel');
            $table->string('email');
            $table->string('pinno');
            $table->integer('paymode')->default(0);
            $table->string('remarks')->nullable();
            $table->integer('status')->default(1);
            $table->string('contact_person');
            $table->string('concell');
            $table->string('conemail')->nullable();
            $table->string('padd')->nullable();
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
        Schema::dropIfExists('payables');
    }
}
