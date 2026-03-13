<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number', 'first_name', 'last_name', 'email', 'phone',
        'address', 'city', 'district', 'postal_code', 'note',
        'total', 'status',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'Beklemede',
            'confirmed' => 'Onaylandı',
            'preparing' => 'Hazırlanıyor',
            'shipped' => 'Kargoya Verildi',
            'delivered' => 'Teslim Edildi',
            'cancelled' => 'İptal Edildi',
            default => $this->status,
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'yellow',
            'confirmed' => 'blue',
            'preparing' => 'indigo',
            'shipped' => 'purple',
            'delivered' => 'green',
            'cancelled' => 'red',
            default => 'gray',
        };
    }
}
