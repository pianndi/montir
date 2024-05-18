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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable()->default('Lorem ipsum dolor sit amet consectetur adipisicing elit.');
            $table->text('video_url')->default('https://youtu.be/jRWA0o5-kTc?si=HoaK9Bs14h1zKSmd');
            $table->text('video_embed_url')->default('https://youtube.com/embed/jRWA0o5-kTc?si=HoaK9Bs14h1zKSmd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
