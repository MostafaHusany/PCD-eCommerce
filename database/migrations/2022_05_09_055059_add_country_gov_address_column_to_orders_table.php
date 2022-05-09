<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryGovAddressColumnToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('address')->nullable()->after('customer_id');

            $table->unsignedBigInteger('country_id')->nullable()->after('customer_id');
            $table->foreign('country_id')->on('districts')->references('id')
            ->onDelete('set null');

            $table->unsignedBigInteger('gove_id')->nullable()->after('customer_id');
            $table->foreign('gove_id')->on('districts')->references('id')
            ->onDelete('set null');

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
            
            $table->dropForeign(['gove_id']);
            $table->dropForeign(['country_id']);
            $table->dropColumn(['country_id','gove_id', 'address']);

        });
    }
}
