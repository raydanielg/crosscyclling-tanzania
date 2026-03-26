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
        Schema::table('event_applications', function (Blueprint $table) {
            if (!Schema::hasColumn('event_applications', 'rider_number')) {
                $table->string('rider_number')->nullable()->unique()->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_applications', function (Blueprint $table) {
            if (Schema::hasColumn('event_applications', 'rider_number')) {
                $table->dropColumn('rider_number');
            }
        });
    }
};
