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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');//->references('customer_id')->on('customers');
            $table->date('order_date');
            $table->decimal('order_total_price');
            $table->text('order_notes');
            $table->enum('order_status',['Sent','Accepted','AcceptedWithChange',
            'Rejected','BeingProcessed','ReadyToDeliver',
            'DeliveryAccepted','DelivelerArrivesToRestaurant','DelivelerReceivesTheOrder','DelivelerArrivesToCustomer','OrderDeliveredToCustomer']);
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
        Schema::dropIfExists('orders');
    }
};
