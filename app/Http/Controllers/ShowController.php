<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use Illuminate\Http\Request;
use App\Models\Show;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;


class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = DB::table('shows')
        ->join('representations', 'shows.id', '=', 'representations.show_id')
        ->select('shows.id', 'shows.title', 'shows.description', 'shows.poster_url', 'shows.bookable', 'shows.price', 'shows.location_id', 'shows.created_at', 'shows.updated_at')
        ->distinct()
        ->orderBy('shows.title', 'asc')
        ->paginate(2);
        $localities = Locality::all();
/*
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

*/

        return view('show.index',[
            'shows'=>$shows,
            'localities' => $localities,
            'resource'=>'spectacles',
            /*'resource1'=>'Catalogue des représentations',
            'resource2'=>'spectacles réservables',
            'resource3'=>'spectacles réservables en-dessous de 9 euro',
            'resource4'=>'spectacles réservables entre 9 euro et 25 euro',
            'resource5'=>'spectacles créés à La Samaritaine',
            'resource6'=>'spectacles créés à Bruxelles',
            'resource7'=>'spectacles mis en scène par Daniel Marcelin',
            'resource8'=>'spectacles avec un seul acteur',
            'bookableshows'=>$bookableshows,
            'bookableshowsunder9'=>$bookableshowsunder9,
            'bookableshowsbetween9and25'=>$bookableshowsbetween9and25,
            'showsfromlasamaritaine'=>$showsfromlasamaritaine,
            'brusselsShows'=>$brusselsShows,
            'marcelinShows'=>$marcelinShows,
            'singleActorShows'=>$singleActorShows,*/


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

        //Récupérer les artistes du spectacle et les grouper par type
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

    public function search(Request $request)
    {
    $localities = Locality::all();
    $postal_code = $request->input('postal_code') == "none" ? null : $request->input('postal_code');
    $reservable = $request->input('reservable');

    $orderBy = $request->has('sortBy') ? $request->input('sortBy') : "shows.title";

    $query = $request->input('query');
    $date = $request->input('date');
    if (!empty($date)) {
        $date = date('Y-m-d', strtotime($date));
    }
    /*if (session()->has('locale')) {
        echo "La clé 'locale' existe dans la session avec la valeur " . session('locale');
    } else {
        echo "La clé 'locale' n'existe pas dans la session";
    }*/




    $shows = DB::table('shows')
        ->select('shows.id', 'shows.title', 'shows.poster_url', 'locations.designation', 'shows.bookable')
        ->join('locations', 'shows.location_id', '=', 'locations.id')
        ->join('localities', 'locality_id', '=', 'localities.id')
        ->leftJoin('representations', 'shows.id', '=', 'representations.show_id')
        ->when(!empty($query), function ($queryBuilder) use ($query) {
            return $queryBuilder->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('shows.title', 'LIKE', "%$query%")
                    ->orWhere('locations.designation', 'LIKE', "%$query%");
            });
        })
        ->when(!empty($date), function ($queryBuilder) use ($date) {
            return $queryBuilder->whereDate('representations.when', $date);
        })
        ->when(!empty($postal_code), function ($queryBuilder) use ($postal_code) {
            return $queryBuilder->where(function ($queryBuilder) use ($postal_code) {
                $queryBuilder->where('localities.postal_code', '=', $postal_code);
            });
        })
        ->when(!empty($reservable), function ($queryBuilder) use ($reservable) {
            return $queryBuilder->where(function ($queryBuilder) use ($reservable) {
                $queryBuilder->where('shows.bookable', '=', 1);
            });
        })
        ->orderBy("$orderBy")
        ->paginate(2);

    return view('show.index', [
        'shows' => $shows,
        'resource' => 'spectacles',
        'localities' => $localities
    ]);
}

}
