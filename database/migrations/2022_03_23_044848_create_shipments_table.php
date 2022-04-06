<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('courier_id');
            $table->foreign('courier_id')->references('id')->on('users');

            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('users');

            $table->string('item');

            $table->longText("pickup_address");
            $table->longText("destination_address");

            $table->dateTime('shipment_date', 0);

            $table->integer('distance')->default(0);
            $table->double('price')->default(0);

            $table->tinyInteger('shipped')->default(0);
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
        Schema::dropIfExists('shipments');
    }
}
