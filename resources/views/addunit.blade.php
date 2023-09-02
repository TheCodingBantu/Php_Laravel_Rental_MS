@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Unit</h4>
                <p class="card-title-desc">Fill all information below</p>

                <form >
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Unit Title</label>
                                <input id="title"  type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Unit Number</label>
                                <input id="unit"  type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Property Name</label>
                                <select id="property" class="form-select select2">
                                    <option>Search Property</option>
                                    @foreach ($properties as $property)
                                    <option value="{{$property->id}}">{{$property->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Price</label>
                                <input id="price"  type="text" class="form-control">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Bedrooms</label>
                                <input id="bedrooms"  type="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Bathrooms</label>
                                <input id="bathrooms"  type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Status</label>
                                <select id="statuss" class="form-select select2">
                                    <option value="vacant">Vacant</option>
                                    <option value="occupied">Occupied</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="metatitle"></label>
                            </div>
                        </div>
                        <div class="col-sm-6">

                                <div class="form-check mb-3 ">
                                    <input class="form-check-input" type="checkbox" id="sale" >
                                    <label class="form-check-label" for="formCheck2">
                                        For Sale
                                    </label>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="parking">
                                    <label class="form-check-label" for="">
                                        Has Parking
                                    </label>
                                </div>
                        </div>

                    </div>

                    <button type="button" class="btn btn-success waves-effect waves-light me-1" onclick="saveUnit()">Save Property</button>


                </form>

            </div>
        </div>
    </div>
</div>

@include('components.footer')
<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/ecommerce-select2.init.js')}}"></script>
<script>

    function saveUnit(){
     let title=$('#title').val();
     let unit=$('#unit').val();
     let property=$('#property').val();
     let sale=$('#sale').is(':checked');
     let parking=$('#parking').is(':checked');
     let price=$('#price').val();
     let bedrooms=$('#bedrooms').val();
     let bathrooms=$('#bathrooms').val();
     let status=$('#statuss').val();



 $.ajax({
            url: "{{route('unit.store')}}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                title: title,
                unit: unit,
                property: property,
                sale: sale ? '1' : '0',
                parking: parking ? '1' : '0',
                price: price,
                bedrooms: bedrooms,
                bathrooms: bathrooms,
                status: status

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
