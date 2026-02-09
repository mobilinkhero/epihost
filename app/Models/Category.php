<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'color',
        'slug',
    ];

    /**
     * Get all vendors in this category
     */
    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }
}
