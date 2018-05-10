<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationValidation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reservations = Reservation::all();
      return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationValidation $request)
    {
      Reservation::create([
        'name' => $request->input('name'),
        'surname' => $request->input('surname'),
        'email' => $request->input('email'),
        'number_of_persons' => $request->input('number_of_persons'),
        'phone' => $request->input('phone'),
        'date' => $request->input('date'),
        'time' => $request->input('time'),
      ]);

    return view('welcome')->with('success','Thank you for the reservation!');
    }


    public function adminstore(ReservationValidation $request)
    {
      Reservation::create([
        'name' => $request->input('name'),
        'surname' => $request->input('surname'),
        'email' => $request->input('email'),
        'number_of_persons' => $request->input('number_of_persons'),
        'phone' => $request->input('phone'),
        'date' => $request->input('date'),
        'time' => $request->input('time'),
      ]);

    return redirect()->route('admin.reservations')->with('success','Reservation added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return view('admin.reservations.reservation', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationValidation $request, Reservation $reservation)
    {
      $reservation->update([
        'name' => $request->input('name'),
        'surname' => $request->input('surname'),
        'email' => $request->input('email'),
        'number_of_persons' => $request->input('number_of_persons'),
        'phone' => $request->input('phone'),
        'date' => $request->input('date'),
        'time' => $request->input('time'),
      ]);
      return redirect()->route('admin.reservations')->with('success', 'Reservation updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
      Reservation::findorfail($reservation->id)->delete();
      return redirect()->route('admin.reservations')->with('success', 'Reservation deleted.');

    }
}
