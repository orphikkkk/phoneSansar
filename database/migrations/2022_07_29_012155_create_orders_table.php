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
            $table->integer('customer');
            $table->double("total",8,2);
            $table->text("line_items");
            $table->string("billing_name");
            $table->text("billing_email");
            $table->text("billing_phone");
            $table->text("billing_street");
            $table->text("billing_district");
            $table->string("status");

            $table->foreign('customer')->references('id')->on('users')->onDelete('cascade');
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
