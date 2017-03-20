<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenes', function (Blueprint $table) {
            $table->increments('id');            
            $table->date('date');
            $table->string('reference_no',60);
            $table->integer('expenes_type_id')->unsigned();
            $table->decimal('price',10,2);
            $table->decimal('exchange_rate',10,2);
            $table->enum('currency',['KHR','THB','USD']);
            $table->decimal('total',10,2);
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
        Schema::dropIfExists('expenes');
    }
}
