<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TicketsPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tickets_posts", function (Blueprint $table) {

            $table->id()->autoIncrement();
            $table->unsignedBigInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->string('owner', '70');
            $table->enum('type', ['external', 'internal']);
            $table->text('message');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            $table->longText('file')->nullable();
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
        Schema::dropIfExists("tickets_posts");
    }
}
