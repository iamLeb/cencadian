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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('interviewer_id');
            $table->foreign('interviewer_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');

            $table->text('why_interested')->nullable();
            $table->text('career_goals')->nullable();
            $table->text('programming_languages')->nullable();
            $table->text('version_control')->nullable();
            $table->text('software_projects')->nullable();
            $table->text('agile_methodology')->nullable();
            $table->text('approach_debugging')->nullable();
            $table->text('creative_approach')->nullable();
            $table->text('collaboration_example')->nullable();
            $table->text('handle_conflicts')->nullable();
            $table->text('ethics_cutting_corners')->nullable();
            $table->text('learn_new_skill')->nullable();
            $table->text('ethics_late_assignment')->nullable();
            $table->text('behavioral_ownership')->nullable();
            $table->text('behavioral_stressful')->nullable();
            $table->text('behavioral_error')->nullable();
            $table->text('technical_add_two')->nullable();
            $table->text('technical_reverse_string')->nullable();
            $table->text('accept_volunteer')->nullable();
            $table->text('additional_comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
