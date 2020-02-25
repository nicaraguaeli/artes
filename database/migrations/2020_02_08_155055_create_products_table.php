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
            $table->timestamps();
            $table->date('expiracion');
            $table->string('nombre');
            $table->float('precio', 8, 2);
            $table->string('codigo')->unique();
            $table->text('descripcion');
            $table->string('materiales');
            $table->enum('estado', ['0', '1'])->default(1);
           
            $table->unsignedBigInteger('category_gender_id');
                       
            $table->foreign('category_gender_id')
            ->references('id')->on('category_gender');

    
            $table->unsignedBigInteger('size_id');
            
            $table->foreign('size_id')
            ->references('id')->on('sizes');
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
