<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verification_badges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('babysitter_profile_id')->constrained()->cascadeOnDelete();
            $table->string('badge_code');
            $table->string('city');
            $table->timestamp('issued_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verification_badges');
    }
};
