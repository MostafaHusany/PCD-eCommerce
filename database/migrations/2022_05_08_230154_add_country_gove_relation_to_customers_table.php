<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryGoveRelationToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['city']);

            $table->unsignedBigInteger('country_id')->nullable()->after('user_id');
            $table->foreign('country_id')->on('districts')->references('id')
            ->onDelete('set null');

            $table->unsignedBigInteger('gove_id')->nullable()->after('user_id');
            $table->foreign('gove_id')->on('districts')->references('id')
            ->onDelete('set null');
            
            $table->string('phone_code')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('city')->after('user_id');

            $table->dropForeign(['gove_id']);
            $table->dropForeign(['country_id']);
            $table->dropColumn(['country_id','gove_id', 'phone_code']);
        });
    }
}
