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
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');;
        });

        Schema::table('user_statuses', function (Blueprint $table) {
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');;
        });

        Schema::table('system_admins', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
        });
        Schema::table('wallets', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
        });
        Schema::table('credit_cards', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('reciver_id')->references('id')->on('users')->onDelete('cascade');;
        });
        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');;
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');;
        });
        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');;
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');;
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');;
        });
        Schema::table('change_orders', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');;
        });
        Schema::table('deliveries', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');;
        });
        Schema::table('item_quantities', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');;
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');;
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('scource_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('destination_id')->references('id')->on('users')->onDelete('cascade');;
        });
        Schema::table('restaurants', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');;
        });
        Schema::table('ads', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');;
        });
        Schema::table('ad_files', function (Blueprint $table) {
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');;
        });
        Schema::table('coupons', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');;
        });
        Schema::table('opening_hours', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');;
        });
        Schema::table('days_of_weeks', function (Blueprint $table) {
            $table->foreign('opening_hour_id')->references('id')->on('opening_hours')->onDelete('cascade');;
        });
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');;
        });
        Schema::table('item_images', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');;
        });
        Schema::table('restaurant_documents', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');;
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
