<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrinters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('model_id');
            $table->string('ipaddress')->unique();
            $table->string('name')->unique();
            $table->string('inv_number')->nullable();
            $table->string('description')->nullable();
            $table->text('comment')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('model_id')->references('id')->on('model_printers');

            $table->index(['name', 'ipaddress']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('printers');
    }
}
