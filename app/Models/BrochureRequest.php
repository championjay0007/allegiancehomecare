<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrochureRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'brochure_path',
        'email_sent',
        'pricing_type', // 'ndis' or 'homecare'
        'ndis_pricing_path', // path to NDIS pricing file
         'pricing_schedule_path' // path to homecare pricing file
    ];

}
