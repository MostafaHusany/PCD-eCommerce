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
            
            $table->string('ar-name')->unique();
            $table->string('en-name')->unique();
            $table->string('sku')->unique();
            $table->string('slug')->unique();

            $table->text('small-description');
            $table->text('description');
            
            $table->text('main_images')->nullable();
            $table->text('images')->nullable();

            $table->text('meta')->nullable();

            $table->unsignedBigInteger('category_id');
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
