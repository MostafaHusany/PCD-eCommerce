<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            /**
             * status => 
             * 0 waiting for payment
             * 1 preparing
             * 2 shipping
             * 3 diliverd
             * -1 restored
             */
            $table->smallInteger('status')->default(0);
            $table->text('note')->nullable();
            $table->text('meta')->nullable();
            $table->float('sub_total')->default(0);
            $table->float('total')->default(0);

            $table->string('code')->unique();// we will use this for filtration ad-time(), cs-time()
            
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')
            ->onUpdate('cascade')->onDelete('set null');


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
        Schema::dropIfExists('orders');
    }
}
