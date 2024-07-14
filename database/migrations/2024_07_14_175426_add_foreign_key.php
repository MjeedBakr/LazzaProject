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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });

        Schema::table('user_statuses', function (Blueprint $table) {
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });

        Schema::table('system_admins', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('wallets', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('credit_cards', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('reciver_id')->references('id')->on('users');
        });
        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('location_id')->references('id')->on('locations');
        });
        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
        });
        Schema::table('change_orders', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
        });
        Schema::table('deliveries', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
        });
        Schema::table('item_quantities', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('item_id')->references('id')->on('items');
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('scource_id')->references('id')->on('users');
            $table->foreign('destination_id')->references('id')->on('users');
        });
        Schema::table('restaurants', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('location_id')->references('id')->on('locations');
        });
        Schema::table('ads', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
        Schema::table('ad_files', function (Blueprint $table) {
            $table->foreign('ad_id')->references('id')->on('ads');
        });
        Schema::table('coupons', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
        Schema::table('opening_hours', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
        Schema::table('days_of_weeks', function (Blueprint $table) {
            $table->foreign('opening_hour_id')->references('id')->on('opening_hours');
        });
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('section_id')->references('id')->on('sections');
        });
        Schema::table('item_images', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
        });
        Schema::table('restaurant_documents', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
