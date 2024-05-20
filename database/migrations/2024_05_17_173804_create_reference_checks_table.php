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
        Schema::create('reference_checks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('reference_id');
            $table->foreign('reference_id')->references('id')->on('intern_references');
            $table->text('duration_capacity');
            $table->text('performance');
            $table->string('teamwork');
            $table->integer('punctuality');
            $table->integer('problem_solving');
            $table->integer('communication');
            $table->integer('professionalism');
            $table->string('suitability');
            $table->text('additional_comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_checks');
    }
};
