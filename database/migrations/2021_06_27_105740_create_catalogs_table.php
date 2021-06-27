<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->integer('bitrix_id');
            $table->string('name');
            $table->string('code');
            $table->string('active');
            $table->string('preview_picture')->nullable();
            $table->string('detail_picture')->nullable();
            $table->integer('sort')->nullable();
            $table->integer('catalog_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('description');
            $table->string('price');
            $table->string('currency_id');
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
        Schema::dropIfExists('catalogs');
    }
}
