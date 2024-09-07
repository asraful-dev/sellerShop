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
        Schema::create('managments', function (Blueprint $table) {
            $table->id();
            $table->integer('position')->default(0)->comment('1=>Managment, 2=>Royal','3=>Founder');
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('number')->nullable();
            $table->string('experience')->nullable();
            $table->string('photo')->nullable();
            $table->integer('status')->default(1)->comment('1=>Active, 0=>Inactive');
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
        Schema::dropIfExists('managments');
    }
};
