<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    #inverse Relationship 1:N

    public function user(){
        return $this-> belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
