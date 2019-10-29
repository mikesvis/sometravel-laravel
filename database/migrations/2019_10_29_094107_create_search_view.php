<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $queries = [];
        $queries[] = "CREATE VIEW searches AS SELECT id, 'App\\\Models\\\Visa\\\Category' as model, 'front.visa.filter' as route, title, slug, NULL as excerpt, content, status, 70 as score FROM categories";
        $queries[] = "SELECT id, 'App\\\Models\\\News' as model, 'front.news.show' as route, title, slug, excerpt, content, status, 90 as score FROM news";
        $queries[] = "SELECT id, 'App\\\Models\\\Page' as model, 'front.page.show' as route, title, slug, NULL as excerpt, content, status, 80 as score FROM pages";
        $queries[] = "SELECT id, 'App\\\Models\\\Visa\\\Visa' as model, 'front.visa.show' as route, title, slug, excerpt, content, status, 100 as score FROM visas";

        $query = implode(" UNION ALL ", $queries);

        DB::statement($query);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW searches");
    }
}
