<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);             //php to connect one to many
    }

    public function comments(){
        return $this->hasMany(Comment::class);             //php to connect one to many
    }

/* for later if time
    public function patients(){
        return $this->belongsTo(Doctor::class);             //php to connect one to many
    }*/

}
