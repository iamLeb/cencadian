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
        //change the teamwork column of reference_checks to text.
        Schema::table('reference_checks', function (Blueprint $table) {
            $table->text('teamwork')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //change the teamwork column of reference_checks back to a string
        Schema::table('reference_checks', function (Blueprint $table) {
            $table->string('teamwork')->change();
        });

    }
};
