<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function hospital(){
        return $this->belongsTo(Hospital::class);          // php connect one to many
    }

    public function specialization(){
        return $this->hasOne(Specialization::class);          // php connect one to one
    }

    public function patients(){
        return $this->belongsToMany(Patient::class);         // php connect many to many
    }

}
