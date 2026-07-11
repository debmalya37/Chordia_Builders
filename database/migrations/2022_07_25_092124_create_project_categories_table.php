<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug_url');
            $table->string('title_tag')->nullable();
            $table->string('canonical_tag')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->string('alt_tag')->nullable();
            $table->tinyInteger('front_cats')->default(0);
            $table->tinyInteger('top_cats')->default(0);
            $table->Integer('sort_order')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('project_categories');
    }
}
