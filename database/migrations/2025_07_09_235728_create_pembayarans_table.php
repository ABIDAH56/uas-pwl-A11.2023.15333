<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rental_id');
            $table->enum('metode', ['transfer', 'ewallet']);
            $table->decimal('jumlah', 10, 2);
            $table->string('bukti');
            $table->timestamps();

            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
