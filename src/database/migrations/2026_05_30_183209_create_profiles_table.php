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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('typing_texts')->nullable()->comment('Comma-separated typing animation texts');
            $table->json('tech_stacks')->nullable()->comment('JSON array of tech stack');
            $table->string('hero_badge')->default('available for work');
            $table->integer('total_tech_stack')->default(7);
            $table->string('dark_mode_status')->default('100%');
            $table->text('hero_description')->nullable();
            $table->boolean('is_active')->default(true)->comment('Profile yang sedang aktif digunakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
