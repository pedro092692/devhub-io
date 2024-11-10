<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class Search extends Component
{
    public $search;



    public function render()
    {
        return view('livewire.search');
    }

    public function getResultsProperty(){
        return Course::where('name', 'LIKE', '%' . $this->search . '%')
                      ->where('status', 3)
                      ->orderBy('name')
                      ->take(5)
                      ->get();
    }
}
