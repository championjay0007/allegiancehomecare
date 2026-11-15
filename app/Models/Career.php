<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public const ROLES = [
        'Support Worker',
        'Registered Nurse',
        'Enrolled Nurse',
        'Physiotherapist',
        'Occupational Therapist',
        'Podiatrist',
        'Care Partner / Care Manager',
        'Administration / Intake',
        'Other',
    ];

    public const LOCATIONS = [
        'Sydney / NSW',
        'Melbourne / VIC',
        'Adelaide / SA',
        'Murray Bridge / SA',
        'Other',
    ];

    public const EMPLOYMENT_TYPES = [
        'Casual',
        'Part-time',
        'Full-time',
        'Contractor',
        'Flexible / Open to options',
    ];

    public const WORK_RIGHTS_OPTIONS = [
        'Australian citizen',
        'Australian permanent resident',
        'Valid working visa - unrestricted work rights',
        'Valid working visa - restricted work rights',
        'Other',
    ];

    public const AVAILABILITIES = [
        'Weekdays',
        'Evenings',
        'Weekends',
        'Flexible availability',
        'Other',
    ];

    public const REFERRAL_SOURCES = [
        'SEEK',
        'Indeed',
        'LinkedIn',
        'Google',
        'Facebook / Social Media',
        'Referral from a friend or colleague',
        'Allegiance website',
        'Other',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'job_position',
        'preferred_location',
        'employment_type_preference',
        'work_rights',
        'availability',
        'referral_source',
        'cover_letter',
        'consent',
        'is_australian_citizen_or_pr',
        'visa_type',
        'has_valid_working_visa',
        'reference_name',
        'reference_relationship',
        'reference_phone',
        'resume_path',
    ];

    protected $casts = [
        'consent' => 'boolean',
    ];
}
