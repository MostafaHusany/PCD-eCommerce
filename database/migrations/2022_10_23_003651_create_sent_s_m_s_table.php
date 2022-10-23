<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentSMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_s_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->tinyInteger('status')->default(0);// 0, 1, -1
            $table->text('message');
            $table->string('err_code')->nullable();
            $table->text('err_msg')->nullable();
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
        Schema::dropIfExists('sent_s_m_s');
    }
}
