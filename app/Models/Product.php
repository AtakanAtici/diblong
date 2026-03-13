<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'short_description',
        'price', 'old_price', 'image', 'image2', 'category',
        'stock', 'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('assets/products/' . $this->image);
    }

    public function getImage2UrlAttribute(): ?string
    {
        return $this->image2 ? asset('assets/products/' . $this->image2) : null;
    }
}
