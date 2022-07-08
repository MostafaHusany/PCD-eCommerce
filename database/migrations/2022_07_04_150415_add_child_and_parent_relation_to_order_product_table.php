<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChildAndParentRelationToOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->tinyInteger('is_child')->default(0);
            $table->unsignedBigInteger('parent_product_id')->nullable();

            $table->foreign('parent_product_id')->on('order_products')->references('product_id')
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
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropForeign(['parent_product_id']);
            $table->dropColumn(['is_child', 'parent_product_id']);
        });
    }
}
