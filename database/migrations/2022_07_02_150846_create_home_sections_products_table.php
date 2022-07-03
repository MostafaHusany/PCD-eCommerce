<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSectionsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_sections_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('theme_settings_id');

            $table->foreign('product_id')->on('products')->references('id')
            ->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->foreign('theme_settings_id')->on('theme_settings')->references('id')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_sections_products');
    }
}
