<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Property';
        $location=Location::all();
        $users=User::all();

        return view('addProperty',compact('title','location','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Property::create([
                'title' => request('title'),
                'owner_id' => request('owner'),
                'manager_id' => request('manager'),
                'location_id' => request('location'),

            ]);
            return Response(['success' => 'Property saved successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return Response(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $title = 'Property List';
        $properties = Property::all();
        return view('property',compact('properties','title'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
