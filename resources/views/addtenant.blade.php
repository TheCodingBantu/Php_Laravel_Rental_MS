@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Tenant</h4>
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
                                <label class="form-label" for="">Phone</label>
                                <input id="phone"  type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="mb-3">
                                <label class="form-label">Entry Date</label>
                                <div class="input-group" id="entrydatecontainer">
                                    <input id="entrydate" type="text" class="form-control" placeholder="dd M, yyyy"
                                        data-date-format="dd/mm/yyyy" data-date-container='#entrydatecontainer' data-provide="datepicker"
                                        data-date-autoclose="true">

                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div><!-- input-group -->
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Rent due date</label>
                                <div class="input-group" id="rentdatecontainer">
                                    <input id="rentdate" type="text" class="form-control" placeholder="dd M, yyyy"
                                        data-date-format="dd/mm/yyyy" data-date-container='#rentdatecontainer' data-provide="datepicker"
                                        data-date-autoclose="true">

                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div><!-- input-group -->
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="">email</label>
                                <input id="email"  type="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="">ID Number</label>
                                <input id="idnumber"  type="number" class="form-control">
                            </div>
                        </div>



                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="">Address</label>
                                <input id="address"  type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Status</label>
                                <select id="statuss" class="form-select select2">
                                    <option value="active">Active</option>
                                    <option value="vacated">Vacated</option>

                                </select>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Unit Occupied</label>
                                <select id="unit" class="form-select select2">
                                    <option>Search Units</option>
                                    @foreach ($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->property->title .' - ' . $unit->unit_number}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="metatitle"></label>
                                <input type="hidden" name="" id="">

                            </div>

                        </div>


                    </div>

                    <button type="button" class="btn btn-success waves-effect waves-light me-1" onclick="saveTenant()">Save Tenant</button>


                </form>

            </div>
        </div>
    </div>
</div>

@include('components.footer')
<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/ecommerce-select2.init.js')}}"></script>
<link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    function saveTenant(){
     let name=$('#name').val();
     let phone=$('#phone').val();
     let unit=$('#unit').val();
     let email=$('#email').val();
     let address=$('#address').val();
     let status=$('#statuss').val();
     let rent_date=$('#rentdate').val();
     let entry_date=$('#entrydate').val();
     let id_number=$('#idnumber').val();

     console.log(address);
 $.ajax({
            url: "{{route('tenant.store')}}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                name,
                phone,
                status,
                email,
                address,
                rent_date,
                entry_date,
                id_number,
                unit
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
