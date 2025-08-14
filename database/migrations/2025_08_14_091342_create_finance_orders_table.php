<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');

            $table->integer('company_id');
            $table->string('company_name');
            $table->string('sothangtragop');
            $table->decimal('sophantramtratruoc',6,2);
            $table->decimal('sotientratruoc',12,2);
            $table->decimal('sotiengopmoithang',12,2);
            $table->decimal('tongtien',12,2);

            $table->string('title');
            $table->string('fullname');
            $table->string('phone');
            $table->string('address');
            $table->string('cccd');
            $table->date('dob');
            $table->string('email')->nullable();

            $table->tinyInteger('status');
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
        Schema::dropIfExists('finance_orders');
    }
}
