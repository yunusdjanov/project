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
            $table->increments('id');
            $table->string('title')->index();
            $table->string('brand');
            $table->text('about');
            $table->text('characteristic');
            $table->text('composition');
            $table->integer('price')->unsigned();
            $table->integer('discount')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->string('thumbnail')->nullable(true);
            $table->integer('subcategory_id')->nullable(true);
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
