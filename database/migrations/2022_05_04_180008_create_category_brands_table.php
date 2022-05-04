<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_brands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->on('product_categories')->references('id')
            ->onUpdate('cascade')->ondelete('cascade');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->on('brands')->references('id')
            ->onUpdate('cascade')->ondelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_brands');
    }
}
