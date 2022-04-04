<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\OrderStatus;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->tinyInteger('is_main')->default(0);// 1 can't be deleted or updated
            $table->tinyInteger('status_code')->unique();
            $table->string('status_name_en');
            $table->string('status_name_ar');
            $table->string('color')->default('#444');
        });

        // by default create restored -1, 0 waiting for action
        OrderStatus::insert([
            ['is_main' => 1, 'status_code' => -1, 'status_name_en' => 'restored', 'status_name_ar' => 'مرتجع', 'color' => '#f00'],
            ['is_main' => 1, 'status_code' => 0, 'status_name_en' => 'waiting', 'status_name_ar' => 'انتظار', 'color' => '#444'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
}
