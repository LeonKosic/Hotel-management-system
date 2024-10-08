<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'description',
        'user_id',
        'room_id',
        'active',
        'reservation_start',
        'reservation_end',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function room() {
        return $this->belongsTo(Room::class);
    }
}
