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
        Schema::create('project_reports', function (Blueprint $table) {
            $table->id();

            $table->foreignId('project_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->longText('problem_analysis');
            $table->longText('system_requirements');
            $table->longText('non_functional_requirements')->nullable();

            $table->longText('main_features');

            $table->longText('architecture');
            $table->longText('architecture_flow')->nullable();

            $table->string('erd_image')->nullable();

            $table->longText('flowchart_steps')->nullable();
            $table->string('flowchart_image')->nullable();

            $table->string('progress_status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_reports');
    }
};