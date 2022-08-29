<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComponent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'amount_of',
    ];

    protected $appends = ['available'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function available(): Attribute
    {
        return Attribute::make(
                get: fn () => floor( intval($this->inventory->stock) / intval($this->amount_of) ),
            );
    }
}
