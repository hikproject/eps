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
        Schema::create('jig', function (Blueprint $table) {
            $table->id();
            $table->string('qr_code');
            $table->string('costumer');
            $table->string('part_number');
            $table->string('type_jig');
            $table->timestamps();
        });
        Schema::create('histori_PPAM', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cd_ppam'); // Diubah dari string ke unsignedBigInteger untuk match dengan tipe id
            $table->unsignedBigInteger('cd_jig'); // Diubah dari string ke unsignedBigInteger untuk match dengan tipe id
            $table->timestamps();

            $table->foreign('cd_ppam')->references('id')->on('detail_PPAM');
            $table->foreign('cd_jig')->references('id')->on('jig');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_PPAM');
        Schema::dropIfExists('jig');
    }
};
