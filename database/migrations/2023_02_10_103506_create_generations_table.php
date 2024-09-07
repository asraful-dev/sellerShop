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
        Schema::create('generations', function (Blueprint $table) {
            $table->id();
            $table->integer('from_id')->nullable();
            $table->integer('to_id')->nullable();
            $table->string('purpose')->nullable();
            $table->string('push_time')->nullable();
            $table->string('refer_type')->nullable();
            $table->string('amount')->nullable();
            $table->string('package_amount')->nullable();
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
        Schema::dropIfExists('generations');
    }
};
