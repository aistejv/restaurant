<?php

namespace App\Http\Controllers;
use App\Main;
use App\Dish;
use Illuminate\Http\Request;
use App\Http\Requests\DishValidation;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dishes = Dish::all();
      return view('dishes.dishes', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $mains = Main::all();
      $dishes = Dish::all();
      return view('dishes.create', compact('mains', 'dishes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishValidation $request)
    {
      Dish::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'main_id' => $request->input('main_id'),
        'image_url' => $request->input('image_url'),
      ]);
    return redirect()->route('admin.dishes')->with('success','Dish added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);
        return view('dishes.dish', compact('dish'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
      $mains = Main::all();
      $dishes = Dish::all();
      return view('dishes.edit', compact('dish', 'mains'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(DishValidation $request, Dish $dish)
    {


      $dish->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'main_id' => $request->input('main_id'),
        'image_url' => $request->input('image_url'),
      ]);
      return redirect()->route('admin.dishes')->with('success', 'Dish updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
      Dish::findorfail($dish->id)->delete();
      return redirect()->route('admin.dishes')->with('success', 'Dish deleted successfully!');
    }

    public function admin(){
      $dishes = Dish::latest()->paginate(8);
      return view('admin.dishes.index', compact('dishes'));
    }
    public function adminshow($id)
    {
        $dish = Dish::find($id);
        return view('admin.dishes.dish', compact('dish'));

    }
}
