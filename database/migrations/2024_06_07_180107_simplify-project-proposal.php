<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ServiceRequest;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //make removed questions nullable to prevent loss of old data.
        Schema::table('service_requests', function (Blueprint $table) {
            $table->string('budget_specify')->default('N/A');
            $table->text('community_involvement')->nullable()->change();
            $table->text('project_team')->nullable()->change();
            $table->text('background_rationale')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('service_requests', 'budget_specify')) {
            Schema::table('service_requests', function(Blueprint $table) {
                   $table->dropColumn('budget_specify');
            });
        };

        //mass assign removed columns to "N/A" if they are null

        $nullCommunityInvolvement = ServiceRequest::whereNull('community_involvement')->get();
        foreach ($nullCommunityInvolvement as $row) {
            ServiceRequest::where('id', $row['id'])->update([
                'community_involvement' => 'N/A'
            ]);
        }

        $nullProjectTeam = ServiceRequest::whereNull('project_team')->get();
        foreach ($nullProjectTeam as $row) {
            ServiceRequest::where('id', $row['id'])->update([
                'project_team' => 'N/A'
            ]);
        }

        $nullBackgroundRationale = ServiceRequest::whereNull('background_rationale')->get();
        foreach ($nullBackgroundRationale as $row) {
            $row['background_rationale'] = "Not given";
            ServiceRequest::where('id', $row['id'])->update([
                'background_rationale' => 'N/A'
            ]);
        };

        Schema::table('service_requests', function (Blueprint $table) {
            //drop budget specify column if it exists

            //change the nullable fields back to required, with a default value of N/A.
            $table->text('community_involvement')->change();
            $table->text('project_team')->change();
            $table->text('background_rationale')->change();
        });
    }
};
