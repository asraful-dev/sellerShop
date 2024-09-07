<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['admin', 'vendor', 'user','staff','account','manager'])->default('user')->comment('1=>Admin, 2=>Vendor,3=>User,4=>Staff,5=>Account,6=>Manager');
            $table->string('show_password')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('refer_by')->nullable();
            $table->string('left_placement')->nullable();
            $table->string('right_placement')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('country')->nullable();
            $table->float('fund_wallet')->default(0);
            $table->float('main_wallet')->default(0);
            $table->float('roc')->default(0);
            $table->float('roc_day')->default(0);
            $table->float('refer_bonus')->default(0);
            $table->string('designation')->nullable();
            $table->unsignedTinyInteger('active_status')->default(0)->comment('1=>Active, 0=>Inactive');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
