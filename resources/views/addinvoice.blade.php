@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="padding-bottom:100px">
            <div class="card-body">

                <h4 class="card-title">Add Invoice</h4>
                <p class="card-title-desc">Fill all information below</p>

                <form style="" action="{{route('invoice.store')}}" method="POST" target="_blank" >
                    @csrf
                    <div class="row ">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Tenant</label>
                                <select onchange="searchUnits()" id="tenant" name="tenant" class="form-select select2">
                                    <option>Search Tenant</option>
                                    @foreach ($tenants as $tenant)
                                    <option value="{{$tenant->id}}">{{$tenant->tenant_name.', ID: '.$tenant->national_id}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Units</label>
                                <select id="" name="" class="form-select select2">
                                    <option>Search Units</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="">Invoice Amount</label>
                                <input id="amount" name="amount"  type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Start Date</label>
                                <div class="input-group" id="startdate">
                                    <input id="start-date" name="start_date" type="text" class="form-control" placeholder="dd M, yyyy"
                                        data-date-format="dd/mm/yyyy" data-date-container='#startdate' data-provide="datepicker"
                                        data-date-autoclose="true">

                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div><!-- input-group -->
                            </div>


                            <div class="mb-3">
                                <label class="form-label">End Date</label>
                                <div class="input-group" id="enddate">
                                    <input id="end-date" name="end_date" type="text" class="form-control" placeholder="dd M, yyyy"
                                        data-date-format="dd/mm/yyyy" data-date-container='#enddate' data-provide="datepicker"
                                        data-date-autoclose="true">

                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div><!-- input-group -->
                            </div>

                        </div>
                        <div class="col-sm-6">

                            <div class="mb-3">
                                <label class="form-label">Due Date</label>
                                <div class="input-group" id="entrydatecontainer">
                                    <input id="due-date" name="due_date" type="text" class="form-control" placeholder="dd M, yyyy"
                                        data-date-format="dd/mm/yyyy" data-date-container='#entrydatecontainer' data-provide="datepicker"
                                        data-date-autoclose="true">

                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div><!-- input-group -->
                            </div>
                            <div class="mb-3">
                                <label class="form-label"></label>
                                <div class="input-group" id="">
                                    <input type="hidden" name="unit_id" id="unit_temp">

                                </div><!-- input-group -->
                            </div>

                        </div>


                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light me-1" >Save Invoice</button>
                    {{-- onclick="saveInvoice()" --}}
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
    function searchUnits(){
    var tenant_id = $('#tenant').val();
    var url='/unit/tenant?tid=:id';
    url = url.replace(':id', tenant_id);

    $.ajax({
                url: url,
                type: 'GET',
                data: {
                    _token: "{{ csrf_token() }}",

                },
                success: function(response) {
                    // change val
                    $('#unit_temp').val(response.unit)
                }
            });


    }

    function saveInvoice(){
     let tenant=$('#tenant').val();
     let amount=$('#amount').val();
     let due_date=$('#due-date').val();
     let start_date=$('#start-date').val();
     let end_date=$('#end-date').val();
     let unit_id=$('#unit').val();

 $.ajax({
            url: "{{route('invoice.store')}}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                tenant,
                amount,
                start_date,
                end_date,
                due_date,
                unit_id
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
