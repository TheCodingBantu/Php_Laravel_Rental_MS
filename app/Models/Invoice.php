<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable=[
        'tenant_id',
        'unit_id',
        'amount',
        'payment_id',
        'balance',
        'ref_number',
        'payment_status',
        'start_date',
        'end_date',
        'due_date'
    ];

    public function tenant(){
        return $this->belongsTo(Tenant::class,'tenant_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }

}
