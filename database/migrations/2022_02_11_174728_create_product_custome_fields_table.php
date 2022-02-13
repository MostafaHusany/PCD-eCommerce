<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCustomeFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_custome_fields', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            /**
             * Here we will link the product with his category custome field
             * each category has it's own custome filed, and we link this fields to a product
             * like a screen size for category screen.
             * 
             * product x is linked to screens category, screen category has screen size custome attribute
             * than we can link product with acustome field
             * 
             * custome field will consist of category_id, product_id, type, title, value
             */

            $table->string('title');
            $table->string('value');
            $table->string('type');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->on('products')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->on('product_categories')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('category_attribute_id');
            $table->foreign('category_attribute_id')->on('category_attributes')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_custome_fields');
    }
}
