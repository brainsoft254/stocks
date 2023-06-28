<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rno')->unique();
            $table->date('trandate');
            $table->date('bankdate');
            $table->string('clcode');
            $table->string('account');
            $table->decimal("amount",20,2)->default(0);
            $table->decimal("balcf",20,2)->default(0);
            $table->decimal("wtax",20,2)->default(0);
            $table->decimal("factax",20,2)->default(0);
            $table->integer("parent")->default(0);
            $table->string("chequeno");
            $table->string("location");
            $table->string("refno")->nullable();
            $table->string("remarks");
            $table->string("staff");
            $table->integer("status")->default(0);
            $table->text("inwords")->nullable();
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
        Schema::dropIfExists('receipts');
    }
}

