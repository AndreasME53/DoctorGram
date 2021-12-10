<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function patients(){
        return $this->belongsToMany(Patient::class);         // php connect many to many
    }

    public function users()
    {
        return $this->belongsTo(User::class);          // php connect one to one
    }

    public function posts(){
        return $this->hasMany(Post::class);             //php to connect one to many
    }

}
