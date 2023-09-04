<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProcessor extends Model
{
    use HasFactory;
    protected $fillable=[
        'processor_name',
        'processor_country',
        'property_id',
        'property_account'
    ];

    public function property(){
        return $this->belongsTo(Property::class,'property_id');
    }
}
