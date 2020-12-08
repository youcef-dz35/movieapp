<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults =[];
        if (strlen($this->search) > 3 ) {
            $searchResults = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI5M2Q4ZmFkZGM4MzYwMGYyOWNjZWM1NTExMmM3YWZiOCIsInN1YiI6IjVmYzIzZjcwMmJjZjY3MDAzZmJmNzQwYyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.SqGRXpQo_THmUtoLRYYOO-euu6TCtM2XqJ6JVYY2CAI')
                ->get('https://api.themoviedb.org/3/search/movie/?query='.$this->search)
                ->json()['results'];

        }
        //dump($searchResults);

        return view('livewire.search-dropdown',[
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}
