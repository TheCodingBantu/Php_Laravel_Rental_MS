<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    function generateRandomString($length = 3,$tenant) {
        $sbr = substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
       return  sprintf('INV_%s%s_%02d', Carbon::now()->format('Y'),$sbr,$tenant );

    }

    public function show()
    {
        $title = 'Invoice List';
        $invoices = Invoice::all();
        return view('invoices',compact('invoices','title'));
    }

    public function store(Request $request)
    {

        try {
            // tenant should also be created on first payment
            Invoice::create([

                'tenant_id' => request('tenant'),
                'amount' => request('amount'),
                'ref_number' =>  $this->generateRandomString(3,request('tenant')),
                'start_date' =>Carbon::createFromFormat('d/m/Y', request('start_date')),
                'end_date' =>Carbon::createFromFormat('d/m/Y', request('end_date')),
                'due_date' =>Carbon::createFromFormat('d/m/Y', request('due_date')),

            ]);
            return Response(['success' => 'Invoice saved successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return Response(['error' => $th->getMessage()]);
        }
    }
    public function create(){

      $tenants =Tenant::all();
      $title='Add Invoice';
      return view('addinvoice',compact('tenants','title'));
    }
}
