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
        Schema::create('event_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();

            $table->string('applicant_type')->default('self');
            $table->string('applicant_name')->nullable();
            $table->string('applicant_phone', 32)->nullable();

            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('unpaid');
            $table->string('payment_reference')->nullable();

            $table->string('status')->default('draft');
            $table->timestamp('submitted_at')->nullable();

            $table->timestamps();

            $table->index(['user_id', 'event_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_applications');
    }
};
