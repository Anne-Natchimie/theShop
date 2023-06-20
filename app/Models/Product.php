<?php

namespace App\Models;

use App\Models\User;
use App\Models\Favori;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    protected $fillable = ['category_id', 
                            'user_id', 
                            'name', 
                            'description', 
                            'price',
                            'defaultImage',
                            'carouselImage']; 

    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function favoris(): HasMany
    {
        return $this->hasMany(Favori::class);
    }

    protected $casts = [
        'carouselImage' => 'array', 
    ];

}
