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
        Schema::create('musicians', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary();
            $table->date('birth_date');
            $table->string('address',70);
            $table->string('num_phone',50);
            $table->text('image');
            $table->text('bio');
            $table->string('surname');
            $table->text('cv');
            $table->float('price',6,2);
            $table->string('musical_genre');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicians');
    }
};
