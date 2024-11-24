<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_customer');
            $table->string('alamat_instansi');
            $table->string('unit');
            $table->integer('unit_non_salary')->nullable();
            $table->decimal('nominal_non_salary', 15, 2)->nullable();
            $table->decimal('pendapatan', 15, 2);
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('services');
    }
};
