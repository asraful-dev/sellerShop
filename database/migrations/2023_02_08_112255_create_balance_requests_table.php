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
        Schema::create('balance_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // who sent
            $table->decimal('amount', 15, 2);
            $table->string('sender_number')->nullable();
            $table->string('gateway')->nullable();
            $table->string('wallet_address')->nullable();
            $table->string('transaction_id');
            $table->string('screenshot')->nullable();
            $table->integer('status')->default(0);
            $table->string('approved_by')->nullable();
            $table->string('rejected_by')->nullable();
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
        Schema::dropIfExists('balance_requests');
    }
};
