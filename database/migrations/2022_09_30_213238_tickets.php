<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tickets", function (Blueprint $table) {

            $table->id()->autoIncrement();
            $table->string('owner', '100');
            $table->string('favored', '100');
            $table->string('client_name', '70');
            $table->string('client_email', '150')->nullable();
            $table->string('client_phone', '20')->nullable();
            $table->string('client_subject');
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->enum('ticket_status', ['closed', 'waiting_c', 'waiting_s', 'waiting_d', 'waiting_f','waiting_o','in_attendance']);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("tickets");
    }
}
