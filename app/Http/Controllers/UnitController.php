<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
  //
  public function show()
  {
      $title = 'Unit List';
      $units = Unit::all();
      return view('units',compact('units','title'));
  }

  public function store()
  {

      try {
          Unit::create([
              'title' => request('title'),
              'unit_number' => request('unit'),
              'property_id' => request('property'),
              'is_for_sale' => request('sale'),
              'has_parking' => request('parking'),
              'price' => request('price'),
              'bedrooms' => request('bedrooms'),
              'bathrooms' => request('bathrooms'),
              'status' => request('status'),
          ]);
          return Response(['success' => 'Unit saved successfully']);

      } catch (\Throwable $th) {
          //throw $th;
          return Response(['error' => $th->getMessage()]);
      }
  }
  public function create(){
    $properties=Property::all();
    $title='Add Unit';

    return view('addunit',compact('properties','title'));
  }
}
