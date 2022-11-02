<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('owner_id')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('type')->nullable();
            $table->string('price')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->enum('status',['open','closed'])->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
