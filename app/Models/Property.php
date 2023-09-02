<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'owner_id',
        'manager_id',
        'location_id',];

    public function owner():BelongsTo{
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function manager():BelongsTo{
        return $this->belongsTo(User::class, 'manager_id');
    }
    public function location():BelongsTo{
        return $this->belongsTo(Location::class, 'location_id');
    }
}
