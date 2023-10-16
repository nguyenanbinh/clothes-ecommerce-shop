<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory, SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariantItems()
    {
        return $this->hasMany(ProductVariantItem::class);
    }
}
