<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const COLUMNS = [
        'phone' => 'string',
        'job_position' => 'string',
        'preferred_location' => 'string',
        'employment_type_preference' => 'string',
        'work_rights' => 'string',
        'availability' => 'string',
        'cover_letter' => 'text',
        'consent' => 'boolean',
    ];

    public function up(): void
    {
        foreach (self::COLUMNS as $column => $type) {
            if (Schema::hasColumn('careers', $column)) {
                continue;
            }

            Schema::table('careers', function (Blueprint $table) use ($column, $type) {
                match ($type) {
                    'text' => $table->text($column)->nullable(),
                    'boolean' => $table->boolean($column)->nullable(),
                    default => $table->string($column)->nullable(),
                };
            });
        }
    }

    public function down(): void
    {
        $columns = array_values(array_filter(
            array_keys(self::COLUMNS),
            fn (string $column): bool => Schema::hasColumn('careers', $column)
        ));

        if ($columns !== []) {
            Schema::table('careers', function (Blueprint $table) use ($columns) {
                $table->dropColumn($columns);
            });
        }
    }
};
