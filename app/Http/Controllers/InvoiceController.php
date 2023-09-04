<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\PaymentProcessor;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class InvoiceController extends Controller
{
    public function pdf(){
            //
            $invoice=Invoice::find(request('iid'));

            $pdf = PDF::loadView('invoice.pdf',compact('invoice'));
            return $pdf->stream();
    }

    function generateRandomString($length = 3, $tenant)
    {
        $sbr = substr(str_shuffle(str_repeat($x = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
        return  sprintf('INV_%s%s_%04d', Carbon::now()->format('Y'), $sbr, $tenant);
    }

    public function show()
    {
        $title = 'Invoice List';
        $invoices = Invoice::all();

        return view('invoices', compact('invoices', 'title'));
    }
    public function store(Request $request)
    {
        try {
            $invoice = Invoice::create([

                'tenant_id' => request('tenant'),
                'amount' => request('amount'),
                'unit_id' => request('unit_id'),
                'ref_number' =>  $this->generateRandomString(3, request('tenant')),
                'start_date' => Carbon::createFromFormat('d/m/Y', request('start_date')),
                'end_date' => Carbon::createFromFormat('d/m/Y', request('end_date')),
                'due_date' => Carbon::createFromFormat('d/m/Y', request('due_date')),

            ]);

            return redirect()->route('invoice.pdf', ['tid' => $invoice->tenant_id,'iid'=>$invoice->id,'iref'=>$invoice->ref_number]);

        } catch (\Throwable $th) {
            //throw $th;
            return Response(['error' => $th->getMessage()]);
        }
    }
    public function create()
    {
        $tenants = Tenant::all();
        $title = 'Add Invoice';
        return view('addinvoice', compact('tenants', 'title'));
    }


    public function retrieve(){
        $invoice=Invoice::with('unit')->with('tenant')->find(request('iid'));
        // retrieve all processors associated with the tenant property
        // get the propery id from the tenant
        $unit=Unit::find($invoice->unit_id);
        $property=Property::find($unit->property_id);
        $processors=PaymentProcessor::where('property_id',$property->id)->get();

        return Response(['invoice' => $invoice,'processors' => $processors]);

    }
}
