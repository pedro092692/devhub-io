<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    #relationship 1:N 

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
