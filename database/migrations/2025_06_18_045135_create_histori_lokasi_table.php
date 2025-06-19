<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('histori_lokasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jig');
            $table->string('lokasi');
            $table->timestamps( );

            $table->foreign('id_jig')->references('id')->on('jig');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_lokasi');
    }
};
