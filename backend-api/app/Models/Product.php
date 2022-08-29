<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
    ];

    protected $appends = ['available'];

    public function productComponents()
    {
        return $this->hasMany(ProductComponent::class);
    }

    public function inventories()
    {
        return $this->hasManyThrough(Inventory::class, ProductComponent::class);
    }

    public function available(): Attribute
    {
        return Attribute::make(
                get: fn () => $this->productComponents->min('available'),
            );
    }
}
