<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//use Illuminate\Support\Facades\DB;

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


            $table->dateTime('sponsor_start')->default(now());
            $table->dateTime('sponsor_end')->default(now());

            /*
            $table->dateTime('sponsor_end')->default(function () {
                $sponsorId = $this->sponsor_id;
                if ($sponsorId === 1) {
                    return now()->addDay(); // Se sponsor_id è 1, aggiungi 1 giorno
                } elseif ($sponsorId === 2) {
                    return now()->addDays(3); // Se sponsor_id è 2, aggiungi 3 giorni
                } elseif ($sponsorId === 3) {
                    return now()->addDays(6); // Se sponsor_id è 3, aggiungi 6 giorni
                } else {
                    return now(); // Valore di default generico
                }
            });
            */
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
