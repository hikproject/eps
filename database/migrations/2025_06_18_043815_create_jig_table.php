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
            $table->unsignedBigInteger('PPAM_id');
            $table->string('qr_code');
            $table->string('costumer');
            $table->string('part_number');
            $table->string('type_jig');
            $table->timestamps( );

            $table->foreign('PPAM_id')->references('id')->on('ppam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jig');
    }
};
