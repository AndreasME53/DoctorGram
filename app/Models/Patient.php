<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    


    public function users(){
        return $this->belongsToMany(User::class, 'user_patient');             //php to connect many to many
    }
/* for later if time
    public function posts(){
        return $this->hasMany(Post::class);             //php to connect one to one
    }*/
}
