<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRUProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_u_product_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('m_product_id');
            $table->unsignedBigInteger('product_id');

            $table->tinyInteger('is_default')->default(0);
            $table->float('upgrade_price');
            $table->tinyInteger('needed_quantity')->default(0);

            $table->foreign('category_id')->on('product_categories')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('m_product_id')->on('products')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('product_id')->on('products')->references('id')
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
        Schema::dropIfExists('r_u_product_categories');
    }
}
