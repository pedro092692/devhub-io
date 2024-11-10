<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarted = ['id'];

    use HasFactory;

    #Inverse Relationship 1: n

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function platform(){
        return $this->belongsTo(Platform::class);
    }

    

    #Relationship 1:1

    public function description(){
        return $this->hasOne(Description::class);
    }

    #Relationship N:N

    public function users(){
        return $this->belongsToMany(User::class);
    }

    # Polymorphic relationship 1:1

    public function resource(){
        return $this->morphOne(Resource::class, 'resourceable');
    }

    # Polymorphic relationship 1:N

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions(){
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
