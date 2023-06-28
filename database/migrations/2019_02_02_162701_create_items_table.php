<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('description');
            $table->string('category');
            $table->string('barcode');
            $table->string('uom');
            $table->decimal('bprice',20,2)->default(0);
            $table->decimal('sprice',20,2)->default(0);
            $table->string('acct_cog');
            $table->string('acct_income');
            $table->string('acct_inventory');
            $table->integer('rol')->default(10);
            $table->integer('status')->default(0);
            $table->integer('vatable')->default(0);
            $table->integer('forpurchase')->default(0);
            $table->integer('forsale')->default(1);
            $table->integer('deleted')->default(1);
            $table->unique(['id','code']);
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
        Schema::dropIfExists('items');
    }
}
