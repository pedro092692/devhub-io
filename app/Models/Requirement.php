<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    #Inverse relationship 1:N

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
