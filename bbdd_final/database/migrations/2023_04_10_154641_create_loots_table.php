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
        Schema::create('loots', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('hero_id');
            $table->foreign('hero_id')
            ->references('id')
            ->on('heroes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')
            ->references('id')
            ->on('items')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loots');
    }
};
