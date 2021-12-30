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
            
            $table->string('ar_name')->unique();
            $table->text('ar_small_description');
            $table->text('ar_description');
            
            $table->string('en_name')->unique();
            $table->text('en_small_description');
            $table->text('en_description');

            $table->string('sku')->unique();
            $table->string('slug')->unique();
            
            $table->text('main_image')->nullable();
            $table->text('images')->nullable();

            $table->text('meta')->nullable();
            $table->smallInteger('quantity')->default(10);
            $table->float('price');
            $table->float('price_after_sale')->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('product_categories')
            ->onDelete('cascade')->onUpdate('cascade');

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
