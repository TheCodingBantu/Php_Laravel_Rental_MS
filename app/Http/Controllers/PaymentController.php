<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Payment;
use App\Models\PaymentProcessor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show()
    {
        $title = 'Payment List';
        $payments = Payment::all();
        return view('payments',compact('payments','title'));
    }

    public function store()
    {

        try {
            $payment=Payment::create([
                'processor_id' => request('processor_id'),
                'invoice_id' => request('invoice_id'),
                'ref_number' => request('ref_number'),
                'amount' => request('amount'),
                'payment_date' => Carbon::now(),


            ]);
            // update the invoice
            $invoice=Invoice::find(request('invoice_id'));
            $invoice->update([
              'payment_id' =>$payment->id,
              'payment_status' => 'PAID'
            ]);


            return Response(['success' => 'Payment saved successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return Response(['error' => $th->getMessage()]);
        }
    }
    public function create(){
      $invoices=Invoice::all();
    //   filter payment processors based on property

      $processors=PaymentProcessor::all();
      $title='Pay Now';
      return view('addpayment',compact('invoices','processors','title'));
    }
}
