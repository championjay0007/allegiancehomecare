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
        Schema::table('brochure_requests', function (Blueprint $table) {
            $table->string('pricing_type')->nullable()->after('email_sent');
            $table->string('ndis_pricing_path')->nullable()->after('pricing_type');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brochure_requests', function (Blueprint $table) {
            $table->dropColumn(['pricing_type', 'ndis_pricing_path', 'pricing_schedule_path']);
        });
    }
};