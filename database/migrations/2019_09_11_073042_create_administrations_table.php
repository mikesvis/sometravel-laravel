<?php

use App\Models\Administration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });

        // Adding admin with password
        $attributes = [
            'name' => 'Admin',
            'email' => 'djthor@bk.ru',
            'password' => Hash::make('password'),
        ];
        (new Administration)->create($attributes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrations');
    }
}
