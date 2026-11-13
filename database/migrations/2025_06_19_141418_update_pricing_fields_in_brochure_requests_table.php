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
        if (!Schema::hasColumn('brochure_requests', 'pricing_type')) {
            Schema::table('brochure_requests', function (Blueprint $table) {
                $table->string('pricing_type')->nullable()->after('email_sent');
            });
        }

        if (!Schema::hasColumn('brochure_requests', 'ndis_pricing_path')) {
            Schema::table('brochure_requests', function (Blueprint $table) {
                $table->string('ndis_pricing_path')->nullable()->after('pricing_type');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $columns = array_values(array_filter(
            ['pricing_type', 'ndis_pricing_path'],
            fn (string $column): bool => Schema::hasColumn('brochure_requests', $column)
        ));

        if ($columns !== []) {
            Schema::table('brochure_requests', function (Blueprint $table) use ($columns) {
                $table->dropColumn($columns);
            });
        }
    }
};