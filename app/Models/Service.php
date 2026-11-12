<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'more_info',
        'icon',
        'image',
        'image2',
        'image3',
        'is_featured',
        'status',
        'category',
        'custom_html',
        'features',
        'metadata'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'features' => 'array',
        'metadata' => 'array'
    ];

    protected $appends = [
        'image_url',
        'image2_url',
        'image3_url',
        'status_badge'
    ];

    protected static function booted(): void
    {
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });

        static::updating(function ($service) {
            if ($service->isDirty('title')) {
                $service->slug = Str::slug($service->title);
            }
        });

        static::deleted(function ($service) {
            foreach (['image', 'image2', 'image3'] as $imageField) {
                if ($service->$imageField && Storage::exists($service->$imageField)) {
                    Storage::delete($service->$imageField);
                }
            }
        });
    }

    public static function getCategoryOptions(): array
    {
        return [
            'aged-care' => 'Aged Care',
            'disability-support' => 'Disability Support',
            'home-care' => 'Home Care',
            'respite-care' => 'Respite Care',
            'specialized-care' => 'Specialized Care'
        ];
    }

    public function getImageUrlAttribute()
    {
        return $this->getImageUrl('image');
    }

    public function getImage2UrlAttribute()
    {
        return $this->getImageUrl('image2');
    }

    public function getImage3UrlAttribute()
    {
        return $this->getImageUrl('image3');
    }

    protected function getImageUrl($field)
    {
        if (!$this->$field) {
            return asset('images/default-service.jpg');
        }
        
        if (Str::startsWith($this->$field, ['http://', 'https://'])) {
            return $this->$field;
        }
        
        return Storage::url($this->$field);
    }

    public static function imageRules()
    {
        return [
            'image' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048'
        ];
    }

    public function getAllImages()
    {
        return [
            'main' => $this->image_url,
            'secondary' => $this->image2_url,
            'tertiary' => $this->image3_url
        ];
    }

    public function renderCustomContent()
    {
        if (empty($this->custom_html)) {
            return null;
        }
        
        return clean($this->custom_html, [
            'HTML.Allowed' => 'div,p,span,h1,h2,h3,h4,h5,h6,strong,em,a[href|target],ul,ol,li,img[src|alt|width|height],table,thead,tbody,tr,th,td,br'
        ]);
    }

    public function relatedServices()
    {
        return self::where('category', $this->category)
            ->where('id', '!=', $this->id)
            ->where('status', 'active')
            ->inRandomOrder()
            ->limit(3)
            ->get();
    }

    public function getStatusBadgeAttribute()
    {
        return [
            'active' => ['color' => 'success', 'label' => 'Active'],
            'inactive' => ['color' => 'danger', 'label' => 'Inactive'],
        ][$this->status] ?? ['color' => 'gray', 'label' => ucfirst($this->status)];
    }
}