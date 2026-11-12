<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_feedback_complaints_table.php
public function up()
{
    Schema::create('feedback_complaints', function (Blueprint $table) {
        $table->id();
        $table->string('name')->nullable(); // optional
        $table->string('email')->nullable(); // optional
        $table->text('message');
        $table->string('category'); // NDIS or Home Care
        $table->boolean('anonymous')->default(false);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_complaints');
    }
};
