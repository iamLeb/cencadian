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
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('intern_references', function (Blueprint $table) {
            $table->dropForeign(['application_id']);
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
        });

        Schema::table('service_requests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('reference_checks', function (Blueprint $table) {
            $table->dropForeign(['reference_id']);
            $table->foreign('reference_id')->references('id')->on('intern_references')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('intern_references', function (Blueprint $table) {
            $table->dropForeign(['application_id']);
            $table->foreign('application_id')->references('id')->on('applications');
        });

        Schema::table('service_requests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('reference_checks', function (Blueprint $table) {
            $table->dropForeign(['reference_id']);
            $table->foreign('reference_id')->references('id')->on('intern_references');
        });
    }
};
