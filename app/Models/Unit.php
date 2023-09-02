<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit extends Model
{
    use HasFactory;
    protected $fillable=[
    'title',
    'unit_number',
    'property_id',
    'is_for_sale',
    'has_parking',
    'price',
    'bedrooms',
    'bathrooms',
    'status'

    ];

    public function property():BelongsTo{
        return $this->belongsTo(Property::class,'property_id');
    }
}
