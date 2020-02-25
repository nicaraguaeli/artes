<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryGenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_gender', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagen');
            $table->text('descripcion');
            $table->enum('estado', ['0', '1'])->default(1);

            $table->unsignedBigInteger('category_id');           
            $table->foreign('category_id')
            ->references('id')->on('categories');

            $table->unsignedBigInteger('gender_id');           
            $table->foreign('gender_id')
            ->references('id')->on('genders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_gender');
    }
}
