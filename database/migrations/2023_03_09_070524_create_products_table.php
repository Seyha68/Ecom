<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prod_name')->nullable();
            $table->string('description')->nullable();
            $table->string('category_id')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable()->default('0');

            $table->integer('original_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('quanlity')->nullable();
            $table->string('trending')->nullable()->default('0');
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
        Schema::dropIfExists('products');
    }
}
