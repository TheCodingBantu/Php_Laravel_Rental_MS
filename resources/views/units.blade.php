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
                        <th>Unit Number</th>
                        <th>Description</th>
                        <th>Property</th>
                        <th>Unit Type</th>
                        <th>Price</th>
                        <th>Bedrooms</th>
                        <th>Bathrooms</th>
                        <th>Has Parking</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($units as $unit)

                        <tr >
                            <td >{{$unit->unit_number}}</td>
                            <td>{{$unit->title}}</td>
                            <td>{{$unit->property->title}}</td>
                            <td>@if ($unit->is_for_sale==1)For sale
                            @else
                                For Rent
                            @endif </td>
                        <td>{{$unit->price}}</td>
                        <td>{{$unit->bedrooms}}</td>
                        <td>{{$unit->bathrooms}}</td>
                        <td>@if ($unit->is_for_sale==1)Yes @else No @endif </td>
                        <td>{{$unit->status}}</td>
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

