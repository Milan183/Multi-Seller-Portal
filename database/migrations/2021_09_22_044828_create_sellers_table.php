<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('username');
            $table->string('email');
            $table->string('pwd');
            $table->string('city');
            $table->string('state');
            $table->string('contact');
            $table->string('role')->nullable(false)->default('Seller');
            $table->string('gender');
            $table->string('birthdate');
            $table->string('hobby');
            $table->string('image');
            $table->bigInteger('status')->nullable(false)->default(1);
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
        Schema::dropIfExists('sellers');
    }
}
