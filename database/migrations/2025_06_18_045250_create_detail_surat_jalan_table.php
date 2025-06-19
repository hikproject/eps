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
        Schema::create('detail_surat_jalan', function (Blueprint $table) {
            $table->id();
            $table->string('cd_surat');
            $table->string('part_number');
            $table->string('type_jig');
            $table->timestamps( );

            $table->foreign('cd_surat')->references('cd_surat')->on('surat_jalan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_surat_jalan');
    }
};
