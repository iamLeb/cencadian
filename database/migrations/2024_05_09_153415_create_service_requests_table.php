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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->text('executive_summary');
            $table->text('community_involvement');
            $table->text('background_rationale');
            $table->text('project_requirements');
            $table->text('project_team');
            $table->string('budget');
            $table->text('other_remarks');
            $table->text('org_category');
            $table->text('service_category');
            $table->text('status');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
