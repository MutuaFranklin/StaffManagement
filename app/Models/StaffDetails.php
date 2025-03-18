<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDetails extends Model
{
    use HasFactory;

   protected $fillable = [
        'index_number',
        'staff_id',
        'current_location',
        'highest_level_of_education',
        'duty_station_id',
        'duty_station',
        'software_expertise',
        'language',
        'software_expertise_level',
        'level_of_responsibility',
        'availability_for_remote_work',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dutyStation()
    {
        return $this->belongsTo(DutyStation::class);
    }
    
}

