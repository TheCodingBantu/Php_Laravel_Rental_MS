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
                        <th>Title</th>
                        <th>Owner</th>
                        <th>Manager</th>
                        <th>Location</th>
                        <th>Actiosn</th>
                    </tr>
                    </thead>

P
                    <tbody>
                        @foreach ($properties as $property)

                        <tr >
                            <td >{{$property->title}}</td>
                            <td>{{$property->owner->name}}</td>
                            <td>{{$property->manager->name}}</td>
                            <td>{{$property->location->location_name}}</td>


                            <td>edit</td>


                        @endforeach

                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@include('components.footer')
@endsection

