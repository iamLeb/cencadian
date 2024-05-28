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
        //
        Schema::table('interviews', function (Blueprint $table) {
            $table->text('availability')->nullable();
            $table->text('describe_self')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        if (Schema::hasColumn('interviews', 'availability')) {
            Schema::table('interviews', function (Blueprint $table) {
                $table->dropColumn('availability');
            });
        }

        if (Schema::hasColumn('interviews', 'describe_self')) {
            Schema::table('interviews', function (Blueprint $table) {
                $table->dropColumn('describe_self');
            });
        }
    }
};
