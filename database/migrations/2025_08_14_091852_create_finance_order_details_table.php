<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('finance_order_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->integer('variant_id');
            $table->string('variant_name');
            $table->decimal('price',12,2);
            $table->integer('quantity');

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
        Schema::dropIfExists('finance_order_details');
    }
}
