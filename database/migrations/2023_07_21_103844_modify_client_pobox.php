<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyClientPobox extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('pobox')->default('')->nullable()->change();
            $table->string('attachedto')->default('')->nullable()->change();
            $table->string('pinno')->default('')->nullable()->change();
            $table->string('contact_person')->default('')->nullable()->change();
            $table->string('concell')->default('')->nullable()->change();
            $table->string('email')->default('')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('pobox')->default('')->nullabe()->change();
            $table->string('attachedto')->default('')->nullabe()->change();
            $table->string('pinno')->default('')->nullabe()->change();
            $table->string('contact_person')->default('')->nullabe()->change();
            $table->string('concell')->default('')->nullabe()->change();
            $table->string('email')->default('')->nullabe()->change();
        });
    }
}
