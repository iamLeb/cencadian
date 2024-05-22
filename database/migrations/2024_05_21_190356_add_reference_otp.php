<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Runs the migration, adding the OTP columns to the intern_references table
     */
    public function up(): void
    {
        Schema::table('intern_references', function(Blueprint $table) {
            $table->string('otp')->default("0");
        });
    }

    /**
     * Reverse the migration, removing the OTP columns from the intern_references table.
     */
    public function down(): void
    {
        if (Schema::hasColumn('intern_references', 'otp')) {
            Schema::table('intern_references', function(Blueprint $table) {
                $table->dropColumn('otp');
            });
        }
    }
};
