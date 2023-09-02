<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function show()
    {
        $title = 'Location List';
        $locations = Location::all();
        return view('locations',compact('locations','title'));
    }

    public function store()
    {

        try {
            Location::create([
                'location_name' => request('name'),
                'location_country' => request('country'),
                'location_county' => request('county'),
                'location_estate' => request('estate'),
                'location_plot_number' => request('plot'),
            ]);
            return Response(['success' => 'Location saved successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return Response(['error' => $th->getMessage()]);
        }
    }
}
