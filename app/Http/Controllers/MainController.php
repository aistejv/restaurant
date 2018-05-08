<?php

namespace App\Http\Controllers;

use App\Main;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\MainValidation;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mains = Main::all();
      return view('admin.mains.index', compact('mains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $mains = Main::all();
      return view('admin.mains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainValidation $request)
    {
      Main::create([
        'title' => $request->input('title')
      ]);
      return redirect()->route('admin.mains')->with('success', 'Main added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(Main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $main)
    {

      return view('admin.mains.main', compact('main'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(MainValidation $request, Main $main)
    {
      $main->update([
        'title' => $request->input('title'),
      ]);
      return redirect()->route('admin.mains')->with('success', 'Main updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
     public function destroy(Main $main)
     {
       Main::findorfail($main->id)->delete();
       return redirect()->route('admin.mains')->with('success', 'Main deleted successfully!');
     }
}
