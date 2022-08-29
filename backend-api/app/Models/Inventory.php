<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_component_id',
        'name',
        'stock',
    ];

    public function productComponent()
    {
        return $this->belongsTo(ProductComponent::class);
    }
}
