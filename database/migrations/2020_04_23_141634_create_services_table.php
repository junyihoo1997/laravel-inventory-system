<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('services', function (Blueprint $table) {
            // $table->uuid('id')->primary();
            $table->increments('id');
            // $table->integer('customerId')->unsigned();
            $table->string('modelName');
            $table->string('serialNumber');
            $table->string('flowTagNumber');
            $table->string('type');
            $table->integer('quantity');
            $table->string('status');
            $table->date('dateIn')->nullable();	
            $table->date('dateOut')->nullable();	
            $table->string('remark')->nullable();
            $table->timestamps();
            // $table->foreign('customerId')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}