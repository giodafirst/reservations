<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Representation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        
        return view('reservation.show', [
            'reservation'=>$reservation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function checkout(Request $request)
    {
        //check we have necessare information
        if(empty( $request->post('places')) || empty( $request->post('representation'))){
            return view('reservation.cancel');
        }
        $representation = Representation::find($request->post('representation'));
        $nbPlaces = $request->post('places');
        
        $intent = $request->user()->createSetupIntent();

        //display payment form
        return view('reservation.checkout', [
            'representation'=>$representation,
            'places'=>$nbPlaces,
            'intent' => $intent,
        ]);
    
    }

    public function processPayment(Request $request)
    {
        //Create stripe customer if doesn't already exist
        $user = $request->user();
        if(empty($user->stripe_id)){
            $user->createAsStripeCustomer();
        }

        //retrieve payent method
        $paymentMethod = $request->query('paymentMethod');
        $user->addPaymentMethod($paymentMethod);

        //Calculer prix
        $representation = Representation::find($request->query('representation'));
        $places = $request->query('places');
        $total = $places * $representation->show->price * 100;
        $stripeCharge = $request->user()->charge(
            $total, $paymentMethod
        );

        //créer la réservations
        if($stripeCharge) {
            $reservation = new Reservation();
            $reservation->representation_id = $representation->id;
            $reservation->user_id = Auth::id();
            $reservation->places = $places;
            $reservation->created_at = Carbon::now();

            if($reservation->save()) {
                return redirect(route('reservations_forUser'));
            }
        }
        return view('reservation.cancel', [
            'message'=>'An error occured somewhere, please try again.'
        ]);
    }

    public function forUser()
    {

        $reservations = Auth::user()->reservations;
       
        return view('reservation.user_index', [
            'reservations' => $reservations,
            'resource' => 'My Reservations'
        ]);
    }

}
