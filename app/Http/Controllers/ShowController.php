<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Show::all();

        $bookableshows = DB::select('SELECT * FROM `shows` WHERE bookable = 1');

        $bookableshowsunder9 = DB::select('SELECT * FROM `shows` WHERE bookable AND price < 9');

        $bookableshowsbetween9and25 = DB::select('SELECT * FROM `shows` WHERE bookable AND price > 9 AND price <25');

        $showsfromlasamaritaine = DB::select('SELECT * FROM `shows` WHERE location_id = 2');

        $brusselsShows = DB::table('shows')
        ->join('locations', 'shows.location_id', '=', 'locations.id')
        ->join('localities', 'locations.locality_id', '=', 'localities.id')
        ->where('localities.locality', 'bruxelles')
        ->get();

        $marcelinShows = DB::table('shows')
        ->join('artist_type_show', 'shows.id', '=', 'artist_type_show.show_id')
        ->join('artist_type', 'artist_type_show.artist_type_id', '=', 'artist_type.id')
        ->join('artists', 'artist_type.artist_id', '=', 'artists.id')
        ->where('artists.firstname', 'Daniel')
        ->where('artists.lastname', 'Marcelin')
        ->where('artist_type.type_id', 1)
        ->get();

        $singleActorShows = DB::table('shows')
        ->join('artist_type_show', 'shows.id', '=', 'artist_type_show.show_id')
        ->join('artist_type', 'artist_type_show.artist_type_id', '=', 'artist_type.id')
        ->select('shows.*')
        ->groupBy('shows.id')
        ->havingRaw('COUNT(artist_type.id) = 1')
        ->get();



        return view('show.index',[
            'shows'=>$shows,
            'bookableshows'=>$bookableshows,
            'bookableshowsunder9'=>$bookableshowsunder9,
            'bookableshowsbetween9and25'=>$bookableshowsbetween9and25,
            'showsfromlasamaritaine'=>$showsfromlasamaritaine,
            'brusselsShows'=>$brusselsShows,
            'marcelinShows'=>$marcelinShows,
            'singleActorShows'=>$singleActorShows,
            'resource'=>'spectacles',
            'resource1'=>'Catalogue des repr??sentations',
            'resource2'=>'spectacles r??servables',
            'resource3'=>'spectacles r??servables en-dessous de 9 euro',
            'resource4'=>'spectacles r??servables entre 9 euro et 25 euro',
            'resource5'=>'spectacles cr????s ?? La Samaritaine',
            'resource6'=>'spectacles cr????s ?? Bruxelles',
            'resource7'=>'spectacles mis en sc??ne par Daniel Marcelin',
            'resource8'=>'spectacles avec un seul acteur',


        ]);
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
        $show = Show::find($id);

        //R??cup??rer les artistes du spectacle et les grouper par type
        $collaborateurs = [];

        foreach($show->artistTypes as $at){
            $collaborateurs[$at->type->type][]=$at->artist;
        }

        return view ('show.show',[
            'show' => $show,
            'collaborateurs' => $collaborateurs,
        ]);

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
