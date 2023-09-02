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
                        <th>Location Name</th>
                        <th>Country</th>
                        <th>County</th>
                        <th>Estate</th>
                        <th>Plot Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($locations as $location)

                        <tr >
                            <td >{{$location->location_name}}</td>
                            <td>{{$location->location_country}}</td>
                            <td>{{$location->location_county}}</td>
                            <td>{{$location->location_estate}}</td>

                            <td>{{$location->location_plot_number}}</td>

                            <td>edit</td>


                        @endforeach

                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@include('components.footer')
@endsection

