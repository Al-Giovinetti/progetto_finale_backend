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
        Schema::create('musicians_musical_instruments', function (Blueprint $table) {
            $table->unsignedBigInteger("instrument_id");
            $table->foreign("instrument_id")->references("id")->on("musical_instruments");

            $table->unsignedBigInteger("musician_id");
            $table->foreign("musician_id")->references("user_id")->on("musicians");

            $table->primary(['instrument_id', 'musician_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicians_musical_instruments');
    }
};
