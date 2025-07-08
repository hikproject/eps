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
        Schema::create('detail_PPAM', function (Blueprint $table) {
            $table->id();
            $table->string('cd_ppam');
            $table->string('part_number');
            $table->unsignedBigInteger('type_jig');
            $table->unsignedBigInteger('cd_plant');
            $table->integer('qty');
            $table->string('status');
            $table->timestamp('created_at')->nullable();
            $table->foreign('cd_ppam')->references('cd_ppam')->on('PPAM');
            $table->foreign('part_number')->references('pn_leoco')->on('parts');
            $table->foreign('type_jig')->references('id')->on('type_jigs');
            $table->foreign('cd_plant')->references('id')->on('plants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_ppam');
    }
};
