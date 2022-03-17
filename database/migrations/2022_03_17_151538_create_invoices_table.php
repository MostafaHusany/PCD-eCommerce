<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->float('sub_total');
            $table->float('fee');
            $table->float('tax');
            $table->float('shipping');
            $table->float('total');
            
            $table->string('status')->default('waiting_payment');
            $table->string('trasnaction_imge')->nullable();
            $table->tinyInteger('payment_refuse_count')->default(0);

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')
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
        Schema::dropIfExists('invoices');
    }
}
