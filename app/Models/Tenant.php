<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable=[
        'tenant_name',
        'tenant_phone',
        'email',
        'address',
        'unit_id',
        'status',
        'rent_due_date',
        'date_of_entry',
        'national_id',
];

public function unit():BelongsTo
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
