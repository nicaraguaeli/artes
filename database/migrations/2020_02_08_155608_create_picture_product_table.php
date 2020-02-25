<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePictureProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('picture_id');
            
            $table->foreign('picture_id')
            ->references('id')->on('pictures')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            
            $table->foreign('product_id')
            ->references('id')->on('products');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picture_product');
    }
}
