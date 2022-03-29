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
            
            $table->smallInteger('status')->default(0);// 0 prepare, 1 on shipping, 2 diliverd, -1 returend
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
