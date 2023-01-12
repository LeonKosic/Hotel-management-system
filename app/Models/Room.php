<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'active',
        'price',
        'description',
    ];    
    public function services() {
        return $this->belongsToMany(Service::class);
    }
    public function reservations() {
        return $this->belongsToMany(Reservation::class);
    }
}
