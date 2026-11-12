<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('brochure_requests', function (Blueprint $table) {
            $table->string('pricing_schedule_path')->nullable()->after('brochure_path');
        });
    }

    public function down()
    {
        Schema::table('brochure_requests', function (Blueprint $table) {
            $table->dropColumn('pricing_schedule_path');
        });
    }
};