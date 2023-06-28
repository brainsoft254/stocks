<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRtypeToReceipts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->smallInteger('rtype')->default(0);
        });

        Schema::table('receipt_details', function (Blueprint $table) {
            $table->string('itemcode')->default('');
            $table->string('iqty')->default(0);
            $table->string('isprice')->default(0);
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn('rtype');
        });
        
        Schema::table('receipt_details', function (Blueprint $table) {
            $table->dropColumn('itemcode');
            $table->dropColumn('iqty');
            $table->dropColumn('isprice');
        });
    }
}
