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
                        <th>Email</th>
                        <th>ID</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($users as $user)

                        <tr >
                            <td >{{$user->name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->national_id}}</td>

                            <td class=" @if ($user->role == 'owner')text-success @else text-warning @endif">{{ucfirst($user->role)}}</td>


                            <td>edit</td>


                        @endforeach

                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@include('components.footer')

@endsection

