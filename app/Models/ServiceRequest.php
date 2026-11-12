<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        // Step 1: Service Type
        'service_type', // ndis, home_care

        // Step 2: Personal Details
        'completing_as', // participant, family, coordinator, other
        'other_role', // optional text
        'full_name',
        'phone',
        'email',
        'postcode',
        'suburb',
        'state',
        'ndis_number',
        'hcp_id',

        // Contact Preferences
        'contact_phone',
        'contact_email',
        'contact_sms',
        'contact_time',

        // Step 3: Service Needs
        'preferred_date',
        'ndis_services', // JSON array
        'hcp_services', // JSON array
        'additional_info',
        'support_docs', // JSON array (file paths)
        'referral_source',
        'consent', // boolean
    ];

    protected $casts = [
        // Boolean fields
        'contact_phone' => 'boolean',
        'contact_email' => 'boolean',
        'contact_sms' => 'boolean',
        'consent' => 'boolean',

        // Dates
        'preferred_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

        // JSON fields for checkboxes/arrays
        'ndis_services' => 'array',
        'hcp_services' => 'array',
        'support_docs' => 'array',
    ];
}