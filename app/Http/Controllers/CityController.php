<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities=City::all();
        return response()->view('dsh.cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('dsh.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|min:3|max:45',
        ]);
        $city= new City();
        $city->name=$request->input('name');
        $isSaved=$city->save();
        session()->flash('alert-type',$isSaved ? "success" : "danger");
        session()->flash('message',$isSaved ? "Created Successfully" : "Create Failed!");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {

        return response()->view('dsh.cities.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:45',
        ]);
        $city->name=$request->input('name');
        $isUpdated=$city->save();
        session()->flash('alert-type',$isUpdated ? "success" : "danger");
        session()->flash('message',$isUpdated ? "Updated Successfully" : "Updated Failed!");
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $isDeleted=$city->delete();
        return redirect()->back();
    }
}
