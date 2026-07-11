<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cat_id');
            $table->string('slug_url');
            $table->string('title_tag')->nullable();
            $table->string('canonical_tag')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('project_overview')->nullable();
            $table->text('description')->nullable();
            $table->string('room_type')->nullable();
            $table->string('rera_no')->nullable();
            $table->text('clubhouse_text')->nullable();
            $table->string('clubhouse_image')->nullable();
            $table->string('amenities')->nullable();
            $table->string('specifications_text')->nullable();
            $table->string('specification_file')->nullable();
            $table->text('floor_plans_text')->nullable();
            $table->string('floor_plans_file')->nullable();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->string('alt_tag')->nullable();
            $table->string('rel_project')->nullable();
            $table->tinyInteger('front_project')->default(0);
            $table->tinyInteger('recommended_project')->default(0);
            $table->string('location_map')->nullable();
            $table->integer('sort_order')->nullable();
            $table->tinyInteger('status')->default(0);  
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
        Schema::dropIfExists('projects');
    }
}
