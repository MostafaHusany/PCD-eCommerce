<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_attributes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->string('type'); // valied options number, option
            // $table->string('metric');
            $table->text('meta')->nullable();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->on('product_categories')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

            /**
             * Title : string
             * type  : string (options, number)
             * metric : string
             * options : json
             * 
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_attributes');
    }
}
