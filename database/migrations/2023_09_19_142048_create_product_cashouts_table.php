<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_cashouts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->float('amount')->default(0);
            $table->string('number')->nullable();
            $table->string('gateway')->nullable();
            $table->string('targetWallet')->nullable();
            $table->string('trx_id')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('holder_name')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('product_cashouts');
    }
};
