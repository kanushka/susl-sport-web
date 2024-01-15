<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['venue_id', 'start_date', 'attendees', 'phone', 'reason', 'user_id'];
}
