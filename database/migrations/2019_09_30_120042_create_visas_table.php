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
            $table->string('title')->unique(); // заголовок "Франция"
            $table->string('title_to'); // заголовок с склонением например "во Францию"
            $table->string('menuname')->nullable(); // название пункта меню
            $table->string('slug')->unique(); // url код
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable(); // описательный текст
            $table->text('documents_text')->nullable(); // текст напротив документов
            $table->unsignedInteger('base_price')->default(0); // базовая цена за одного человека
            $table->unsignedTinyInteger('application_type')->default(1); // тип подачи: 0 - Только личная, 1 - Личная и без присутствия
            $table->unsignedInteger('application_absence_price')->nullable(); // надбавка для цены при типе подачи "без присутствия"
            $table->unsignedTinyInteger('acceptance_type')->default(1); // тип предоставления док-тов: 0 - Только самостоятельно, 1 - Забор курьером или сам
            $table->unsignedInteger('acceptance_price')->nullable();  // цена забора при типе предоставления "Забор курьером"
            $table->unsignedTinyInteger('delivery_type')->default(1); // тип доставки: 0 - Только самовывоз, 1 - Доставка курьером и самовывоз
            $table->unsignedInteger('delivery_price')->nullable();  // цена доставки при типе доставки "Доставка курьером"
            $table->boolean('is_insurable')->default(1); // в "Дополнительные сервисы" есть пункт страховка при оформлении
            $table->boolean('is_popular')->default(0); // популярное направление
            $table->unsignedInteger('ordering')->default(0); // порядок
            $table->boolean('status')->default(0); // статус
            $table->string('seo_name')->nullable(); // seo name
            $table->string('seo_keywords')->nullable(); // seo keywords
            $table->text('seo_description')->nullable(); // seo description
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
