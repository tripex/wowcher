<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('vouchers', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id');
      $table->string('name')->nullable();
      $table->string('redeem_code');
      $table->integer('voucher_campaign_id')->nullable();
      $table->string('type');
      $table->dateTime('start_date')->nullable();
      $table->dateTime('end_date')->nullable();
      $table->string('status');
      $table->integer('max_usages')->nullable();
      $table->integer('currency')->unsigned();
      $table->integer('discount');
      $table->softDeletes();
      $table->timestamps();
      $table->unique(['user_id', 'redeem_code']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('vouchers');
  }
}
