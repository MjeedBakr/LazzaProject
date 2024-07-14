<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id');//->references('restaurant_id')->on('restaurants');
            $table->foreignId('section_id');//->references('section_id')->on('sections');
            $table->string('item_name');
            $table->text('item_description');
            $table->decimal('item_price');
            $table->boolean("item_availability");
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
        Schema::dropIfExists('items');
    }
};
