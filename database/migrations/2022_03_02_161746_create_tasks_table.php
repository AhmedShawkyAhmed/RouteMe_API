<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('orderNumber');
            $table->string('driverId');
            $table->string('dispatcherId');
            $table->string('clientName');
            $table->string('clientPhone');
            $table->string('itemCount');
            $table->string('price');
            $table->string('vendorId');
            $table->string('branchId');
            $table->string('location');
            $table->string('start');
            $table->string('end');
            $table->string('comment');
            $table->string('status');
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
        Schema::dropIfExists('tasks');
    }
}
