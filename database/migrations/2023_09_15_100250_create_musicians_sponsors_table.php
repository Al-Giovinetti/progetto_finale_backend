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
        Schema::create('musicians_sponsors', function (Blueprint $table) {
            $table->unsignedBigInteger('musician_id');
            $table->unsignedBigInteger('sponsor_id');
            $table->datetime('sponsor_start');
            $table->datetime('sponsor_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicians_sponsors');
    }
};
