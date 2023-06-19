<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{

    protected $fillable = ['product_id', 
                            'position', 
                            'image'];

    use HasFactory;

    function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
