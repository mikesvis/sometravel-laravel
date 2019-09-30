<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('title_to');
            $table->string('menuname')->nullable();
            $table->string('slug')->unique();
            $table->text('content')->nullable();
            $table->text('documents_text')->nullable();
            $table->unsignedInteger('base_price')->default(0);
            $table->unsignedInteger('ordering')->default(0);
            $table->boolean('status')->default(1);
            $table->string('seo_name')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
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
        Schema::dropIfExists('visas');
    }
}
