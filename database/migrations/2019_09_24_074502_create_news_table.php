<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('content')->nullable();
            $table->timestamp('date');
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
        Schema::dropIfExists('news');
    }
}
