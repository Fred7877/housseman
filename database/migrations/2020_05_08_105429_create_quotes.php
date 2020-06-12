<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('title');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('event_id')->nullable();
            $table->unsignedInteger('prestation_id');
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('prestation_id')->references('id')->on('prestations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote');
    }
}
