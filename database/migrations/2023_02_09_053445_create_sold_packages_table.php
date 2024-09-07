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
        Schema::create('sold_packages', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('package_name')->nullable();
            $table->float('amount')->default(0);
            $table->float('day_payment')->default(0);
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
        Schema::dropIfExists('sold_packages');
    }
};
