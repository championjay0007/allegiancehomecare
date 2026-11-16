<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'category',
        'anonymous',
    ];

    protected $casts = [
        'anonymous' => 'boolean',
    ];
}
