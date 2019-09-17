<?php

use App\Models\Gallery;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->nullable()->default(1);
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('ordering')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('galleries')->onDelete('cascade');

        });

        // Adding top level gallery
        $attributes = [
            'parent_id' => null,
            'title' => 'Главный уровень',
            'ordering' => 0,
            'status' => 1,
        ];
        (new Gallery)->create($attributes);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
