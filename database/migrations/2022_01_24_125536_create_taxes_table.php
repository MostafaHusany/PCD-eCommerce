<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->text('description');
            
            $table->float('cost');
            $table->tinyInteger('cost_type')->default(0);// 0 package, 1 per item
            $table->tinyInteger('is_fixed')->default(0);// 0 percentage, 1 fixed
            $table->tinyInteger('is_active')->default(0);// 0 percentage, 1 fixed

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxes');
    }
}
