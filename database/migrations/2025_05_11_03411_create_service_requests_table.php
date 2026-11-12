<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            
            // Step 1: Service Type
            $table->string('service_type'); // ndis, home_care
            
            // Step 2: Personal Details
            $table->string('completing_as')->nullable(); // participant, family, coordinator, other
            $table->string('other_role')->nullable();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->string('postcode');
            $table->string('suburb');
            $table->string('state');
            $table->string('ndis_number')->nullable();
            $table->string('hcp_id')->nullable();

            // Contact Preferences
            $table->boolean('contact_phone')->default(false);
            $table->boolean('contact_email')->default(true);
            $table->boolean('contact_sms')->default(false);
            $table->string('contact_time')->nullable(); // morning, afternoon, evening, anytime

            // Step 3: Service Needs
            $table->date('preferred_date')->nullable();
            $table->json('ndis_services')->nullable(); // array of services
            $table->json('hcp_services')->nullable(); // array of services
            $table->text('additional_info')->nullable();
            $table->json('support_docs')->nullable(); // file paths
            $table->string('referral_source')->nullable(); // search, referral, etc.
            $table->boolean('consent')->default(false);

            // Timestamps
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('service_requests');
    }
};
