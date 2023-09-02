@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Location</h4>
                <p class="card-title-desc">Fill all information below</p>

                <form >
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Name</label>
                                <input id="name"  type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Country</label>
                                <select id="country" class="form-select select2">
                                    <option>Select</option>
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">County/State</label>

                                <input id="county" type="text" class="form-control">

                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="">Estate</label>
                                <input id="estate" name="" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Plot Number</label>
                                <input id="plot" name="" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success waves-effect waves-light me-1" onclick="saveLocation()">Save Location</button>


                </form>

            </div>
        </div>
    </div>
</div>

@include('components.footer')
<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/ecommerce-select2.init.js')}}"></script>
<script>
    function saveLocation(){
     let name=$('#name').val();
     let country=$('#country').val();
     let county=$('#county').val();
     let estate=$('#estate').val();
     let plot=$('#plot').val();
     console.log();

 $.ajax({
            url: "{{route('location.add')}}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                name: name,
                country: country,
                county: county,
                estate: estate,
                plot: plot,
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
