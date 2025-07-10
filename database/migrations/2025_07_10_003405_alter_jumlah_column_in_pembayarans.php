<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterJumlahColumnInPembayarans extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Drop kolom jumlah dulu
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropColumn('jumlah');
        });

        // Tambah ulang kolom jumlah sebagai decimal
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->decimal('jumlah', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Drop kolom jumlah decimal
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropColumn('jumlah');
        });

        // Tambah ulang kolom jumlah sebagai integer
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->integer('jumlah');
        });
    }
}
