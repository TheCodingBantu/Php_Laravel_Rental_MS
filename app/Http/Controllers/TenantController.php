<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function show()
    {
        $title = 'Tenant List';
        $tenants = Tenant::all();
        return view('tenants',compact('tenants','title'));
    }

    public function store(Request $request)
    {
        try {
            // tenant should also be created on first payment
            Tenant::create([

                'tenant_name' => request('name'),
                'tenant_phone' => request('phone'),
                'unit_id' => request('unit'),
                'status' => request('status'),
                'rent_due_date' =>Carbon::createFromFormat('d/m/Y', request('rent_date')),
                'date_of_entry' =>Carbon::createFromFormat('d/m/Y',  request('entry_date')),
                'national_id' => request('id_number'),
            ]);
            return Response(['success' => 'Tenant saved successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return Response(['error' => $th->getMessage()]);
        }
    }
    public function create(){

      $units =Unit::all();
      $title='Add Tenant';
      return view('addtenant',compact('units','title'));
    }
}
