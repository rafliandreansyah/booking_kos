<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'boarding_house_id',
        'code',
        'room_id',
        'name',
        'email',
        'phone_number',
        'payment_method',
        'payment_status',
        'start_date',
        'duration',
        'total_amount',
        'transaction_date',
    ];

    public function boardingHouse()
    {
        return $this->belongsTo(BoardingHouse::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
