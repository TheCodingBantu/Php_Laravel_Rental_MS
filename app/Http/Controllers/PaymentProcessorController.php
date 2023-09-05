<?php

namespace App\Http\Controllers;

use App\Models\PaymentProcessor;
use App\Models\Property;
use Illuminate\Http\Request;

class PaymentProcessorController extends Controller
{
    public function show()
    {
        $title = 'Payment Accounts List';
        $processors = PaymentProcessor::all();
        $properties = Property::all();
        return view('paymentmethods',compact('processors','properties','title'));
    }

    public function store()
    {

        try {
            PaymentProcessor::create([
                'processor_name' => request('processor_name'),
                'processor_country' => request('processor_country'),
                'property_id' => request('property_id'),
                'property_account' => request('property_account'),

            ]);
            return Response(['success' => 'Payment Detailed saved successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return Response(['error' => $th->getMessage()]);
        }
    }

    public function retrieve(){
    $processor = PaymentProcessor::find(request('pid'));
        return Response(['processor' => $processor]);
    }

}
