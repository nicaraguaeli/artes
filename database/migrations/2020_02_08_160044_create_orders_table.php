<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->enum('pendiente', ['0', '1'])->default(1);
            $table->enum('enviado', ['0', '1'])->default(0);
            $table->enum('confirmado', ['0', '1'])->default(0);
            $table->enum('tipo', ['0', '1'])->default(0);
          
            $table->unsignedBigInteger('user_id');           
            
            $table->foreign('user_id')
            ->references('id')->on('users')->onDelete('cascade');

             $table->unsignedBigInteger('store_id');           
            
            $table->foreign('store_id')
            ->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
