<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = ['name','director_id','deputy_director_id'];


    public function director()
    {
        return $this->belongsTo(user::class);
    }
    public function deputy_director()
    {
        return $this->belongsTo(user::class);
    }
}


