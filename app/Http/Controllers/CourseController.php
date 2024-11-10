<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function show(Course $course){
        $similar = Course::where('category_id', $course->category_id)
                            ->where('id', '!=', $course->id)  
                            ->where('status', 3)
                            ->latest('id')
                            ->take(5)
                            ->get();


        return view('courses.show', compact('course', 'similar'));
    }

    public function index(){
        return view('courses.index');
    }
    

    public function enrolled(Course $course){
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('course.status', $course);
    }
}
