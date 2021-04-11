<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('product_name');
            $table->string('product_slug')->unique();
            $table->longText('description');
            $table->string('warranty')->nullable();
            $table->string('product_image')->nullable();
            $table->string('stock');
            $table->float('price');
            $table->float('offer_price')->nullable();
            $table->float('discount_price')->nullable();
            $table->string('weight')->nullable();
            $table->enum('size',['s','m','l','xl','xxl'])->default('s');
            $table->string('colours');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->date('date');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('child_cat_id');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('child_cat_id')->references('id')->on('categories');
            $table->foreign('vendor_id')->references('id')->on('vendors');
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
        Schema::dropIfExists('products');
    }
}
