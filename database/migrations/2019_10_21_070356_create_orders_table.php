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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('visa_id')->nullable();
            $table->unsignedTinyInteger('steps_completed')->default(0);
            $table->text('steps')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedBigInteger('sum')->default(0);
            $table->unsignedBigInteger('total')->default(0);
            $table->text('order_params')->nullable();
            $table->unsignedTinyInteger('payment_method')->nullable();
            $table->text('payment_params')->nullable();
            $table->timestamp('email_sent_at')->nullable();
            $table->timestamp('appliance_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->text('management_notes')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->foreign('visa_id')
                ->references('id')->on('visas')
                ->onDelete('set null');
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
