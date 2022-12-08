<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Agents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("agents", function (Blueprint $table) {

            $table->id()->autoIncrement();
            $table->string('name', '100');
            $table->enum('department', ['support', 'developers', 'ombudsman']);
            $table->boolean('status');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("agents");
    }
}
