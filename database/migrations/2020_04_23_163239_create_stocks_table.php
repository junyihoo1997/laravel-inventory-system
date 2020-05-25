<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modelName');
            $table->string('type');
            $table->integer('quantity');
            $table->string('status');
            $table->string('remark')->nullable();
            // $table->foreignId('customerId')->constrained('customers');
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
        Schema::dropIfExists('stocks');
    }
}
