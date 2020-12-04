<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotajualdetilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notajualdetil', function (Blueprint $table) {
            $table->unsignedBigInteger('id_notajual');
            $table->foreign('id_notajual')->references('id')->on('notajuals');

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
        Schema::dropIfExists('notajualdetil');
    }
}
