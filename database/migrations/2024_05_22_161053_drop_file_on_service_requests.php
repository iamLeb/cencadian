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
        Schema::table('service_requests', function (Blueprint $table) {
            $table->dropColumn('file');
        });

        Schema::table('service_requests', function (Blueprint $table) {
            $table->dropColumn('other_remarks');
        });

        Schema::table('service_requests', function (Blueprint $table) {
            $table->text('other_remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services_request', function (Blueprint $table) {
            $table->string('file'); // adjust the column type as needed
//            $table->string('other_remarks'); // adjust the column type as needed
        });
    }
};
