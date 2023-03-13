<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representation;
use App\Models\Show;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;



class RepresentationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale('fr');
        //$representations = Representation::all();

        $representations = DB::table('shows')
        ->join('representations', 'shows.id', '=', 'representations.show_id')
        ->join('locations', 'representations.location_id', '=', 'locations.id')
        ->select('shows.title', 'representations.when', 'locations.designation')
        ->orderBy('shows.title')
        ->paginate(10);
    
    

        return view('representation.index',[
            'representations' => $representations,
            'resource' => 'représentations',

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
        $representation = Representation::find($id);
        $date = Carbon::parse($representation->when)->format('d/m/Y');
        $time = Carbon::parse($representation->when)->format('G:i');

        return view('representation.show',[
            'representation' => $representation,
            'date' => $date,
            'time' => $time,
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

        App::setLocale('fr');

        $query = $request->input('query');
        
        if ($request->has('filterBy')) {
            $orderBy = $request->input('filterBy');
        } else {
            $orderBy = "shows.title";
        }
        
        $date = $request->input('date');
        if (!empty($date)) {
            $date = date('Y-m-d', strtotime($date));
        }
        
        $representations = DB::table('representations')
        ->join('shows', 'representations.show_id', '=', 'shows.id')
        ->join('locations', 'representations.location_id', '=', 'locations.id')
        ->when(!empty($query), function ($queryBuilder) use ($query) {
            return $queryBuilder->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('shows.title', 'LIKE', "%$query%")
                    ->orWhere('locations.designation', 'LIKE', "%$query%");
            });
        })
        ->when(!empty($date), function ($queryBuilder) use ($date) {
            return $queryBuilder->whereDate('representations.when', $date);
        })

        ->orderBy('shows.title')
        ->paginate(2);


        return view('representation.index', [
            'representations' => $representations,
            'resource' => 'représentations',
            ]
            );
    }


}

