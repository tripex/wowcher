<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('voucher_id');
            $table->integer('voucher_campaign_id')->nullable();
            $table->integer('original_amount');
            $table->integer('new_amount');
            $table->string('order_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('media')->nullable();
            $table->string('media_campaign')->nullable();
            $table->string('media_keyword')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('requests');
    }
}
