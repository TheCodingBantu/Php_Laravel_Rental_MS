@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title"></h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>Payment Reference</th>
                        <th>Payment Method</th>
                        <th>Invoice Ref</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($payments as $payment)
                        <tr >
                            <td>{{$payment->ref_number}}</td>
                            <td>{{$payment->processor->processor_name}}</td>
                            <td ><a target="_blank" href="{{route('invoice.pdf',['iid'=>$payment->invoice_id,'iref'=>$payment->invoice->ref_number])}}">{{$payment->invoice->ref_number}}</a></td>
                            <td>{{$payment->amount}}</td>
                            <td>{{$payment->payment_date}}</td>
                            <td>edit</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@include('components.footer')
@endsection

