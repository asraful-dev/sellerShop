<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceRequestNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_request_notifies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->decimal('amount', 15, 2);
            $table->string('wallet_address')->nullable();
            $table->string('trx_id')->nullable();
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
        Schema::dropIfExists('balance_request_notifies');
    }
}
