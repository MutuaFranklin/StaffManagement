<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'index_number', 'branch_unit_id', 'division_id', 
        'duty_station_id', 'contract_type_id', 'start_date', 'end_date', 
        'sro_id', 'fro_id', 'status', 'current_location', 'highest_level_of_education', 
        'duty_station', 'software_expertise', 'language', 'software_expertise_level', 
        'level_of_responsibility'
    ];
 
    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }


    public function fro()
    {
        return $this->belongsTo(User::class, 'fro_id');
    }

    public function sro()
    {
        return $this->belongsTo(User::class, 'sro_id');
    }

    public function branchUnit()
    {
        return $this->belongsTo(branchUnit::class, 'branch_unit_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function dutyStation()
    {
        return $this->belongsTo(DutyStation::class, 'duty_station_id');
    }

    public function contractType()
    {
        return $this->belongsTo(ContractType::class, 'contract_type_id');
    }
}
