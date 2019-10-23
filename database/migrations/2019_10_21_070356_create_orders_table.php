<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('visa_id');
            $table->unsignedTinyInteger('steps_completed')->default(0);
            $table->text('steps')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedTinyInteger('sum')->default(0);
            $table->unsignedTinyInteger('total')->default(0);
            $table->unsignedTinyInteger('payment_method')->default(0);
            $table->text('payment_params')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
