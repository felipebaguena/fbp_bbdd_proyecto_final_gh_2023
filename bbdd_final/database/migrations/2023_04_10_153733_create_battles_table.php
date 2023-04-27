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
        Schema::create('battles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('hero_id');
            $table->foreign('hero_id')
                ->references('id')
                ->on('heroes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('monster_id');
            $table->foreign('monster_id')
                ->references('id')
                ->on('monsters')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('stage_id');
            $table->foreign('stage_id')
                ->references('id')
                ->on('stages')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->boolean('hero_victory')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battles');
    }
};
