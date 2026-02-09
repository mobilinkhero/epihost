<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'rating',
        'is_verified',
        'city',
        'price',
        'category_id',
        'description',
    ];

    protected $casts = [
        'rating' => 'float',
        'price' => 'float',
        'is_verified' => 'boolean',
    ];

    /**
     * Get the category this vendor belongs to
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all services offered by this vendor
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
