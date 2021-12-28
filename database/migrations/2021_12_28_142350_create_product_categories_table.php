<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();

            $table->string('ar-title')->unique();
            $table->string('en-title')->unique();
            $table->text('ar-description');
            $table->text('en-description');
            $table->smallInteger('rule')->default(0);

            $table->smallInteger('is_main')->default(1);   

            $table->unsignedBigInteger('category_id')->nullable();;
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
        Schema::dropIfExists('product_categories');
    }
}
