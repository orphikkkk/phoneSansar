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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("slug");
            $table->text("description")->nullable();
            $table->text("photo")->nullable();
            $table->float("price",8,2)->nullable();
            $table->text("sku");
            $table->bigInteger("vendor")->unsigned();
            $table->double("average_rating",4,2)->nullable();
            $table->bigInteger("category_id")->nullable()->unsigned();


            $table->foreign('vendor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
