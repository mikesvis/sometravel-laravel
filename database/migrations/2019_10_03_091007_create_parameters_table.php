<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('visa_id');
            $table->string('title');
            $table->string('calculator_title')->nullable();
            $table->boolean('is_on_calculator_page')->default(0);
            $table->string('order_title')->nullable();
            $table->boolean('is_on_order_page')->default(1);
            $table->text('description')->nullable();
            $table->unsignedInteger('ordering')->default(0);
            $table->boolean('required')->default(0);
            $table->timestamps();

            $table->foreign('visa_id')
                ->references('id')->on('visas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameters');
    }
}
