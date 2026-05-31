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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('message')->nullable();

            $table->enum('contact_type', [
                'email',
                'github',
                'linkedin',
                'instagram',
                'whatsapp',
                'website',
                'message',
            ])->default('message')->comment('Type of contact');

            $table->boolean('is_system_contact')
                ->default(false)
                ->comment('True for social media/contact link, false for form submission');

            $table->string('url')
                ->nullable()
                ->comment('URL for social media/contact link');

            $table->string('icon')
                ->nullable()
                ->comment('Emoji or icon identifier');

            $table->integer('display_order')
                ->default(0)
                ->comment('Sort order for display');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};