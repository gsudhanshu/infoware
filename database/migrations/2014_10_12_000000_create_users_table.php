<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('surname')->nullable();
            $table->string('name')->nullable();
            $table->string('relatives_name')->nullable();
            $table->integer('aadhar_card_no')->unique();
            $table->string('address_street_hno')->nullable();
            $table->string('address_village')->nullable();
            $table->string('address_taluka')->nullable();
            $table->string('address_district');
            $table->string('address_state');
            $table->string('address_country');
            $table->integer('address_pincode');
            $table->integer('phone')->nullable();
            $table->integer('mob_no')->nullable();
            $table->integer('whatsapp_mob_no')->nullable();
            $table->integer('telegram_mob_no')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
