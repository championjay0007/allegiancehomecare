<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'referral_source',
        'is_australian_citizen_or_pr',
        'visa_type',
        'has_valid_working_visa',
        'reference_name',
        'reference_relationship',
        'reference_phone',
        'resume_path',
    ];
}
