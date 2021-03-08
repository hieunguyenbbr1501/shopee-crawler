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
            $table->id();
            $table->string("name")->nullable();
            $table->integer("sold")->nullable();
            $table->integer("history_sold")->nullable();
            $table->double("price_min")->nullable();
            $table->double("price_max")->nullable();
            $table->double("rating")->nullable();
            $table->integer("liked")->nullable();
            $table->integer("view")->nullable();
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
