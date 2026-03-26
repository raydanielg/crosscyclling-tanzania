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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'avatar_path')) {
                $table->string('avatar_path')->nullable()->after('phone');
            }

            if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender', 20)->nullable()->after('avatar_path');
            }

            if (!Schema::hasColumn('users', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable()->after('gender');
            }

            if (!Schema::hasColumn('users', 'region')) {
                $table->string('region')->nullable()->after('date_of_birth');
            }

            if (!Schema::hasColumn('users', 'city')) {
                $table->string('city')->nullable()->after('region');
            }

            if (!Schema::hasColumn('users', 'club')) {
                $table->string('club')->nullable()->after('city');
            }

            if (!Schema::hasColumn('users', 'bio')) {
                $table->text('bio')->nullable()->after('club');
            }

            if (!Schema::hasColumn('users', 'emergency_contact_name')) {
                $table->string('emergency_contact_name')->nullable()->after('bio');
            }

            if (!Schema::hasColumn('users', 'emergency_contact_phone')) {
                $table->string('emergency_contact_phone', 32)->nullable()->after('emergency_contact_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'avatar_path',
                'gender',
                'date_of_birth',
                'region',
                'city',
                'club',
                'bio',
                'emergency_contact_name',
                'emergency_contact_phone',
            ];

            foreach ($columns as $col) {
                if (Schema::hasColumn('users', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
