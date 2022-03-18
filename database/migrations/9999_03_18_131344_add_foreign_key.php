<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {

            $table  ->foreign('article_id', 'comment_article')
                    ->references('id')
                    ->on('articles');
        });

        Schema::table('articles', function (Blueprint $table) {

            $table  ->foreign('category_id', 'articles_categories')
                    ->references('id')
                    ->on('categories');
        });

        Schema::table('places', function (Blueprint $table) {

            $table  ->foreign('category_id', 'place_category')
                    ->references('id')
                    ->on('categories');
        });

        Schema::table('article_photos', function (Blueprint $table) {

            $table  ->foreign('article_id', 'article_photo_article')
                    ->references('id')
                    ->on('articles');
        });

        Schema::table('place_photos', function (Blueprint $table) {

            $table  ->foreign('place_id', 'place_photo_category')
                    ->references('id')
                    ->on('places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {

            $table->dropForeign('comment_article');
        });

        Schema::table('articles', function (Blueprint $table) {

            $table->dropForeign('article_category');
        });

        Schema::table('places', function (Blueprint $table) {

            $table->dropForeign('place_category');
        });

        Schema::table('article_photos', function (Blueprint $table) {

            $table->dropForeign('article_photo_article');
        });

        Schema::table('place_photos', function (Blueprint $table) {

            $table->dropForeign('place_photo_category');
        });
    }
}
