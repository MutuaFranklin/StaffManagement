<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branchUnit extends Model
{
    use HasFactory;

       protected $fillable = ['name','head_id','division_id'];


    public function division()
    {
        return $this->belongsTo(division::class);
    }
    public function head()
    {
        return $this->belongsTo(user::class);
    }
}