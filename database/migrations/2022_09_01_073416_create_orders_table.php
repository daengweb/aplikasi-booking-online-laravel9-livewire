<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daily_slot_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name', 50);
            $table->string('age', 5);
            $table->string('phone_number', 15);
            $table->string('note');
            $table->char('status', 1)->comment('0: pending, 1: active, 2: complete, 3: cancel');
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
        Schema::dropIfExists('orders');
    }
};
