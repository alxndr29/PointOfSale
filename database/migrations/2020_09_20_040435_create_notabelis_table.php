<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotabelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notabelis', function (Blueprint $table) {
            $table->id();
            $table->string('nomornota');
            $table->string('total');
            $table->enum('tipebayar', ['tunai', 'kredit']);
            $table->date('jatuhtempo');
            $table->enum('terverifikasi',['yes','no'])->default('no');

            $table->unsignedBigInteger('suplier_id');
            $table->foreign('suplier_id')->references('id')->on('supliers');

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
        Schema::dropIfExists('notabelis');
    }
}
