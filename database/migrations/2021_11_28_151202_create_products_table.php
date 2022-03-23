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
            $table->string("name");
            $table->longText('description');
            $table->longText('image');
            $table->biginteger("price");
            
            $table->string("cpu");
            $table->string("ram");
            $table->string("storage");
            $table->string("graphics");
            $table->string("display");
            $table->string("battery_capacity");
            $table->string("color");
            $table->string("dimensions")->default("");
            $table->string("weight")->default("");
            $table->longText("ports")->default("");
            $table->longText("connectivity")->default("");

            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('brand_id');

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
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
