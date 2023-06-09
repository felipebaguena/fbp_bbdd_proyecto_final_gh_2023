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
        Schema::create('monsters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('health');
            $table->longText('description');
            $table->unsignedBigInteger('monster_image_id')->nullable();
            $table->timestamps();

            $table->foreign('monster_image_id')->references('id')->on('monster_images')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monsters');
    }
};
