<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('product_name', 255)->nullable();
            $table->unsignedBigInteger('product_id');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->unsignedTinyInteger('is_varient')->default(0)->comment('1=>Varient Product, 0=>Normal Product');
            $table->longtext('variation')->nullable();
            $table->string('qty', 100)->nullable();
            $table->float('price',20,2)->default(0.00);
            $table->integer('product_sales_quantity')->nullable();;
            $table->float('tax',20,2)->default(0.00);
            $table->float('shipping_cost',20,2)->default(0.00);
            $table->string('payment_status')->default('unpaid');
            $table->string('shipping_type')->nullable();
            $table->integer('pickup_point_id')->nullable();
            $table->string('product_referral_code')->nullable();
            $table->string('delivery_status')->default('pending');
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
        Schema::dropIfExists('order_details');
    }
}
