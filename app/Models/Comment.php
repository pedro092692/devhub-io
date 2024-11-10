<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    public function commentable(){
        return $this->morphTo();
    }

    # Polymorphic Relationhip 1:N

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions(){
        return $this->morphMany(Reaction::class, 'reactionatable');
    }

    #Relationship 1:N

    public function user(){
        return $this->BelongsTo(User::class);
    }
}
