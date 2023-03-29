<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Show;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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
            'singleActorShows'=>$singleActorShows,
            */


        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public  function all($message="", $color=""){
        $shows = Show::all();
        return view('show.all', ["shows" => $shows, 'message' => $message, 'color' =>$color]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('show.create', ["locations" => $locations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Storage::disk('public')->put('.', $request->file('poster_url'));
        $title = $request->title;
        $slug = $this->slugify($title);
        $description = $request->description;
        $price = $request->price;
        $bookable= $request->has('bookable') ? 1 : 0;
        $poster_url = $name;
        $location_id = $request->location_id;

        Show::create([
            'title'=> $title,
            'slug'=> $slug,
            'description'=> $description,
            'price'=> $price,
            'bookable'=> $bookable,
            'poster_url'=> $poster_url,
            'location_id'=> $location_id,
        ]);

        return to_route('show.all', [
            'color' => 'green',
            'message' => "Show \"$title\" successfully created !",
        ]);
    }

    /**
     * @param $text
     * @param string $divider
     * @return string
     */
    public function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }
        return $text;
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
        $show = Show::findOrFail($id);
        $locations = Location::all();
        return view('show.update', ['show' => $show, 'locations' => $locations]);
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
        $show = Show::findOrFail($id);
        Storage::disk('public')->delete($show->poster_url);
        $name = Storage::disk('public')->put('.', $request->file('poster_url'));
        $title = $request->title;
        $slug = $this->slugify($title);
        $description = $request->description;
        $price = $request->price;
        $bookable= $request->has('bookable') ? 1 : 0;
        $poster_url = $name;
        $location_id = $request->location_id;

        $show->update([
            'title'=> $title,
            'slug'=> $slug,
            'description'=> $description,
            'price'=> $price,
            'bookable'=> $bookable,
            'poster_url'=> $poster_url,
            'location_id'=> $location_id,
        ]);

        return to_route('show.all', [
            'color' => 'rgba(208, 135, 0, 1.00)',
            'message' => "Show \"$title\" successfully updated !",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $show = Show::findOrFail($id);
        Storage::disk('public')->delete($show->poster_url);
        $show->delete();
        return to_route('show.all', [
            'color' => 'red',
            'message' => "Show \"$show->title\" successfully deleted",
        ]);
    }

    public function search(Request $request)
    {
    $localities = Locality::all();
    $postal_code = $request->input('postal_code') == "none" ? null : $request->input('postal_code');
    $reservable = $request->input('reservable');


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
        ->select('shows.id', 'shows.title', 'shows.poster_url', 'locations.designation', 'shows.bookable', 'locations.locality_id', 'shows.price')
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
        ->orderBy("shows.title")
        ->paginate(2);


    return view('show.index', [
        'shows' => $shows,
        'resource' => 'spectacles',
        'localities' => $localities,
    ]);
}

public function sort()
{

    $sort = request()->query('sortBy');
    $order = request()->query('order', 'asc');
    // dd($order);
    switch ($sort) {
        case 'reservable':
            $orderBy = 'shows.bookable';
            break;
        case 'zip':
            $orderBy = 'shows.location_id';
            break;
        case 'prix':
            $orderBy = 'shows.price';
            break;
        default:
            $orderBy = 'shows.title';
            break;

    }
    $shows = DB::table('shows')
    ->join('representations', 'shows.id', '=', 'representations.show_id')
    ->select('shows.id', 'shows.title', 'shows.description', 'shows.poster_url', 'shows.bookable', 'shows.price', 'shows.location_id', 'shows.created_at', 'shows.updated_at')
    ->distinct()
    ->orderBy("$orderBy", "$order")
    ->paginate(2);
    $localities = Locality::all();

    return view('show.index', [
        'shows' => $shows,
        'resource' => 'spectacles',
        'localities' => $localities,
    ]);

}
}
