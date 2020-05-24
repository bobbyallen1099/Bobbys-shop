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
        // Products
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->double('price', 8, 2);
            $table->boolean('live')->default(false);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('category_id');
            $table->timestamps();
        });

        // Image gallery for product
        Schema::create('product_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_name');
            $table->integer('product_id');
            $table->integer('order');
            $table->timestamps();
        });

        // Categories for products
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
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
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_categories');
    }
}
