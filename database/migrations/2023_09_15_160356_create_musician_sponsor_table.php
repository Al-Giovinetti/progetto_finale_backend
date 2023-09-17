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
        Schema::create('musician_sponsor', function (Blueprint $table) {
            $table->unsignedBigInteger('musician_id');
            $table->foreign('musician_id')->references('user_id')->on('musicians')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('sponsor_id');
            $table->foreign('sponsor_id')->references('id')->on('sponsors')->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['musician_id', 'sponsor_id']);
            
            $table->dateTime('sponsor_start')->default(null);
            $table->dateTime('sponsor_end')->default(null);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musician_sponsor');
    }
};
