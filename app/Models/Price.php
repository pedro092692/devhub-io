<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    #Relationship 1:N

    public function course(){
        return $this->hasMany(Course::class);
    }
}
