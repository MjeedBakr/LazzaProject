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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id');//->references('user_id')->on('users');
            $table->foreignId('reciver_id');//->references('user_id')->on('users');
            $table->enum('ticket_type',['Suggestion', 'Complaint', 'Other']);
            $table->enum('ticket_status',['Open','Closed']);
            $table->date('ticket_date');
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
        Schema::dropIfExists('tickets');
    }
};
