<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('babysitter_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('bio')->nullable();
            $table->decimal('hourly_rate', 10, 2)->nullable();
            $table->unsignedTinyInteger('experience_years')->nullable();
            $table->json('specializations')->nullable();
            $table->string('cnic')->nullable();
            $table->string('avatar')->nullable();
            $table->json('availability')->nullable();
            $table->string('verified_status')->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('babysitter_profiles');
    }
};
