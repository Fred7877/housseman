<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('address');
            $table->string('ville');
            $table->string('pays');
            $table->string('email')->unique();
            $table->text('detail')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->morphs('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
