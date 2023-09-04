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
                        <th>Invoice Ref</th>
                        <th>Unit</th>
                        <th>Amount</th>
                        <th>Tenant Name</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr >
                            <td ><a target="_blank" href="{{route('invoice.pdf', ['tid' => $invoice->tenant_id,'iid'=>$invoice->id,'iref'=>$invoice->ref_number])}}">{{$invoice->ref_number}}</a></td>
                            <td>{{$invoice->unit->unit_number}}</td>

                            <td>{{$invoice->amount}}</td>
                            <td>{{$invoice->tenant->tenant_name}}</td>
                            <td>{{$invoice->start_date}}</td>
                            <td>{{$invoice->end_date}}</td>
                            <td>{{$invoice->due_date}}</td>
                            <td ><span class="badge bg-danger">{{$invoice->payment_status}}</span></td>

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

