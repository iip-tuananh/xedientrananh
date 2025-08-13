<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('banner_groups', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('title');
    //         $table->integer('created_by');
    //         $table->integer('updated_by');
    //         $table->timestamps();
    //     });

    //     Schema::create('banner_group_galleries', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->integer('group_id');
    //         $table->integer('sort');
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('banner_groups');
    // }
}
