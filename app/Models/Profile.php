<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    #Inverse relationship 1:1 

    public function user(){
        return $this->belongsTo(User::class);
    }
}
