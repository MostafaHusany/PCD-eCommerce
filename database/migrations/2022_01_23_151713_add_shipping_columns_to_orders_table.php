<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingColumnsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->float('shipping_cost')->default(0.0);
            $table->tinyInteger('is_free_shipping')->default(0);
            
            $table->unsignedBiginteger('shipping_id')->nullable();
            $table->foreign('shipping_id')->references('id')->on('shippings')
            ->onUpdate('cascade')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['shipping_id']);
            $table->dropColumn(['shipping_cost', 'is_free_shipping', 'shipping_id']);
        });
    }
}
