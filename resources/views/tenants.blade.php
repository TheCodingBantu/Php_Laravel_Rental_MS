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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>ID Number</th>
                        <th>Property</th>
                        <th>Current Unit</th>
                        <th>Entry Date</th>
                        <th>Rent Due Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($tenants as $tenant)

                        <tr >
                            <td >{{$tenant->tenant_name}}</td>
                            <td>{{$tenant->tenant_phone}}</td>
                            <td>{{$tenant->national_id}}</td>
                            <td>{{$tenant->unit->property->title}}</td>
                            <td>{{$tenant->unit->unit_number}}</td>
                            <td>{{$tenant->date_of_entry}}</td>
                            <td>{{$tenant->rent_due_date}}</td>
                            <td>{{$tenant->status}}</td>
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

