<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateBinaryCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_binary_calculations', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->integer('user_id')->nullable();
            $table->decimal('lp', 10, 2)->nullable();
            $table->decimal('rp', 10, 2)->nullable();
            $table->decimal('income', 10, 2)->nullable();
            $table->decimal('lc', 10, 2)->nullable();
            $table->decimal('rc', 10, 2)->nullable();
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
        Schema::dropIfExists('date_binary_calculations');
    }
}
