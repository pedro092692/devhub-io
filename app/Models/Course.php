<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews'];

    use HasFactory;
    
    #constans 
    const DRAFT = 1;
    const REVIEWING = 2;
    const PUBLISHED = 3;

    public function getRatingAttribute(){

        if($this->reviews_count){
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 5;
        }
    }

    

    // Query scopes 
    public function scopeCategory($query, $category_id){
        if($category_id){
            return $query->where('category_id', $category_id);
        }
    }

    
    public function scopeLevel($query, $level_id){
        if($level_id){
            return $query->where('level_id', $level_id);
        }
    }


    public function getRouteKeyName()
    {
        return "slug";
    }

    #Inverse relationship 1:N

    public function teacher(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function goals(){
        return $this->hasMany(Goal::class);
    }

    public function requirements(){
        return $this->hasMany(Requirement::class);
    }

    public function Sections(){
        return $this->hasMany(Section::class);
    }

    public function audiences(){
        return $this->hasMany(Audience::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }  
    

    #Inverse realationship N:N

    public function students(){
        return $this->belongsToMany(User::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function price(){
        return $this->belongsTo(Price::class);
    }

    # Polymorphic Relationship 1:1

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function lessons(){
        return $this->hasManyThrough(Lesson::class, Section::class);
    }

}
