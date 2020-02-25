<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomizePictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customize_picture', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descripcion');
            $table->timestamps();

            $table->unsignedBigInteger('customize_id');           
            
            $table->foreign('customize_id')
            ->references('id')->on('customizes')->onDelete('cascade');
            
            $table->unsignedBigInteger('picture_id');           
            
            $table->foreign('picture_id')
            ->references('id')->on('pictures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customize_picture');
    }
}
