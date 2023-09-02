@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Property</h4>
                <p class="card-title-desc">Fill all information below</p>

                <form >
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Property Title</label>
                                <input id="title"  type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Owner</label>
                                <select id="owner" class="form-select select2">
                                    <option>Search Owner</option>
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Manager</label>
                                <select id="manager" class="form-select select2">
                                    <option>Search Manager</option>
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Location</label>
                                <select id="location" class="form-select select2">
                                    <option>Search Location</option>
                                    @foreach ($location as $location)
                                    <option value="{{$location->id}}">{{$location->location_name}}, Plot Number:  {{$location->location_plot_number}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <button type="button" class="btn btn-success waves-effect waves-light me-1" onclick="saveProperty()">Save Property</button>


                </form>

            </div>
        </div>
    </div>
</div>

@include('components.footer')
<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/ecommerce-select2.init.js')}}"></script>
<script>
    function saveProperty(){
     let title=$('#title').val();
     let owner=$('#owner').val();
     let manager=$('#manager').val();
     let location=$('#location').val();
     console.log(name,);

 $.ajax({
            url: "{{route('property.store')}}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                title: title,
                owner: owner,
                manager: manager,
                location: location,

            },
            success: function(response) {
                // if error
                if (response.error) {
                    // hide modal

                    toastr.error(response.error);

                }
                // if success
                if (response.success) {
                    // show success

                    toastr.success(response.success);


                }
            }
        });

    }
</script>

@endsection
