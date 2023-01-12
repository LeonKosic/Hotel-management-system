<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'active',
        'price',
        'description'
    ];
    public function rooms() {
        return $this->belongsToMany(Room::class);
    }
    public function reservations() {
        return $this->belongsToMany(Reservation::class);
    }
}
