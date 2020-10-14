<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnInnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //`phone`, `mob_no`, `whatsapp_mob_no`, `telegram_mob_no`
            $table->bigInteger('phone')->change();
            $table->bigInteger('mob_no')->change();
            $table->bigInteger('whatsapp_mob_no')->change();
            $table->bigInteger('telegram_mob_no')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //`phone`, `mob_no`, `whatsapp_mob_no`, `telegram_mob_no`
            $table->integer('phone')->change();
            $table->integer('mob_no')->change();
            $table->integer('whatsapp_mob_no')->change();
            $table->integer('telegram_mob_no')->change();
        });
    }
}
