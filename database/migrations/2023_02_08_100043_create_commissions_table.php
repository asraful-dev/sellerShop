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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->float('refer1')->nullable();
            $table->float('refer2')->nullable();
            $table->float('refer3')->nullable();
            $table->float('refer4')->nullable();
            $table->float('refer5')->nullable();
            $table->float('refer6')->nullable();
            $table->float('refer7')->nullable();
            $table->float('refer8')->nullable();
            $table->float('refer9')->nullable();
            $table->float('refer10')->nullable();
            $table->float('refer11')->nullable();
            $table->float('refer12')->nullable();
            $table->float('refer13')->nullable();
            $table->float('refer14')->nullable();
            $table->float('refer15')->nullable();
            $table->float('refer16')->nullable();
            $table->float('refer17')->nullable();
            $table->float('refer18')->nullable();
            $table->float('refer19')->nullable();
            $table->float('refer20')->nullable();
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
        Schema::dropIfExists('commissions');
    }
};
