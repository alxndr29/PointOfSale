<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNotabelidetil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notabelidetil', function (Blueprint $table) {
            $table->unsignedBigInteger('id_notabeli');
            $table->foreign('id_notabeli')->references('id')->on('notabelis');

            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_barang')->references('id')->on('barangs');

            $table->integer('jumlah');
            $table->double('harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notabelidetil');
    }
}
