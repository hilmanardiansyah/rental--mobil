<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'total_cost',
        'status',
        'return_date',
        'late_fee'
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'return_date' => 'datetime'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function setReturnDateAttribute($value)
    {
        $this->attributes['return_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setLateFeeAttribute($value)
    {
        $this->attributes['late_fee'] = $value;
    }
}
