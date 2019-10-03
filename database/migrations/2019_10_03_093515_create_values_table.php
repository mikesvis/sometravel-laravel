<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parameter_id');
            $table->string('calculator_title');
            $table->string('order_title')->nullable();
            $table->bigInteger('price')->default(0);
            $table->boolean('is_default')->default(0);
            $table->unsignedInteger('ordering')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('parameter_id')
                ->references('id')->on('parameters')
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
        Schema::dropIfExists('values');
    }
}
