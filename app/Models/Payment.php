<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=[
        'processor_id',
        'invoice_id',
        'ref_number',
        'amount',
        'payment_date'
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id');
    }
    public function processor(){
        return $this->belongsTo(PaymentProcessor::class,'processor_id');
    }
}
