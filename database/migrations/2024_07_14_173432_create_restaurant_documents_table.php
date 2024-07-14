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
        Schema::create('restaurant_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id');//->references('restaurant_id')->on('restaurants');
            $table->enum('document_type',['HealthCertificate','CommercialRegister','RestaurantLogo','RestaurantPhoto']);
            $table->string('document_path');
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
        Schema::dropIfExists('restaurant_documents');
    }
};
