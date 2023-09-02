<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable=[
        'tenant_id',
        'amount',
        'balance',
        'ref_number',
        'invoice_status',
        'start_date',
        'end_date',
        'due_date'
    ];

    public function tenant(){
        return $this->belongsTo(Tenant::class,'tenant_id');
    }
}
