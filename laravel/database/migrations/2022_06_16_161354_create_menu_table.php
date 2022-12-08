<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("cuisine");
            $table->integer("price");
            $table->integer("discount");
            $table->integer("weight");
            $table->string("img");
            $table->string("mealkit");
            $table->string("category");
            $table->string("description");
            $table->string("sides")->nullable();
            $table->integer("in_stock");
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
        Schema::dropIfExists('menu');
    }
}
