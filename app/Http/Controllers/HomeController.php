<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Countries;
use App\Dish;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   $promos = Dish::latest()->take(9)->get();
        $images = Dish::all();
        return view('welcome', compact('promos', 'images'));
    }


    // public function countries()
    // {
    //     $countries = Countries::all();
    //     dd($countries);
    //
    //     // return view('countries',compact('countries'));
    // }
}
