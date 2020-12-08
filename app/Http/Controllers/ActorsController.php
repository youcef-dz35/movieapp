<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\ViewModels\ActorViewModel;
use App\ViewModels\ActorsViewModel;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        \abort_if($page >500, 204);
        //
        $popularActors =Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI5M2Q4ZmFkZGM4MzYwMGYyOWNjZWM1NTExMmM3YWZiOCIsInN1YiI6IjVmYzIzZjcwMmJjZjY3MDAzZmJmNzQwYyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.SqGRXpQo_THmUtoLRYYOO-euu6TCtM2XqJ6JVYY2CAI')
        ->get('https://api.themoviedb.org/3/person/popular?page='.$page)
                ->json()['results'];
        //dd($popularMovies);
        $viewModel = new ActorsViewModel($popularActors,$page);
        return view('actors.index',$viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $actor = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI5M2Q4ZmFkZGM4MzYwMGYyOWNjZWM1NTExMmM3YWZiOCIsInN1YiI6IjVmYzIzZjcwMmJjZjY3MDAzZmJmNzQwYyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.SqGRXpQo_THmUtoLRYYOO-euu6TCtM2XqJ6JVYY2CAI')
            ->get('https://api.themoviedb.org/3/person/'.$id)
            ->json();

        $social =Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI5M2Q4ZmFkZGM4MzYwMGYyOWNjZWM1NTExMmM3YWZiOCIsInN1YiI6IjVmYzIzZjcwMmJjZjY3MDAzZmJmNzQwYyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.SqGRXpQo_THmUtoLRYYOO-euu6TCtM2XqJ6JVYY2CAI')
            ->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')
            ->json();

        $credits =Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI5M2Q4ZmFkZGM4MzYwMGYyOWNjZWM1NTExMmM3YWZiOCIsInN1YiI6IjVmYzIzZjcwMmJjZjY3MDAzZmJmNzQwYyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.SqGRXpQo_THmUtoLRYYOO-euu6TCtM2XqJ6JVYY2CAI')
            ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')
            ->json();

        $viewModel = new ActorViewModel($actor, $social, $credits);

        return view('actors.show', $viewModel);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
