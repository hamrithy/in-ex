<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('reference_no');
            $table->integer('revenue_type_id')->unsigned();
            $table->double('price',2);
            $table->double('exchange_rate',2);
            $table->enum('currency',['KHR','THB','USD']);
            $table->double('total',2);
            $table->softDeletes();
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
        Schema::dropIfExists('revenues');
    }
}
