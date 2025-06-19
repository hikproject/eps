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
        Schema::create('ppam', function (Blueprint $table) {
            $table->id();
            $table->string('cd_ppam')->unique();
            $table->string('applicant');
            $table->string('costumer');
            $table->string('part_number');
            $table->string('type_jig');
            $table->string('cd_plant');
            $table->integer('qty');
            $table->string('status');
            $table->date('due_date');
            $table->timestamps();

            $table->foreign('cd_plant')->references('cd_plant')->on('plants');
            $table->foreign('type_jig')->references('cd_type')->on('type_jigs');
            $table->foreign('part_number')->references('part_number')->on('parts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppam');
    }
};
