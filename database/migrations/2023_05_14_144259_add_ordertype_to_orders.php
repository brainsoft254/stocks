<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdertypeToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->smallInteger('ordertype')->default(0);
            $table->double('depositpaid',10,2)->default(0);
            $table->string('depositacct')->nullable()->default('');
            $table->smallInteger('postype')->default(0);
            $table->string('deporno')->nullable();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('ordertype');
            $table->dropColumn('depositpaid');
            $table->dropColumn('depositacct');
            $table->dropColumn('postype');
            $table->dropColumn('deporno');
        });
    }
}
