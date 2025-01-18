<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarReturn extends Model
{
    use HasFactory;

    protected $fillable = [
            'rental_id',
            'return_date',
            'late_fee',
            'total_cost',
    ];
    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
