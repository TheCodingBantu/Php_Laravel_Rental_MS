@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row g-4 align-items-center mb-2">
                    <div class="col-sm">
                        <div>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2 mb-2">
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="mdi mdi-plus align-bottom me-1 "></i> Add Method</button>
                        </div>
                    </div>
                </div>


                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>Bank/Processor Name</th>
                        <th>A/c Number</th>
                        <th>Property name</th>

                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($processors as $processor)

                        <tr >
                            <td >{{$processor->processor_name}}</td>
                            <td>{{$processor->property_account}}</td>
                            <td>{{$processor->property->title}}</td>
                            <td>{{$processor->processor_country}}</td>
                            <td>edit</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" autocomplete="off">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Processor Name</label>
                        <input type="text" id="processor_name" class="form-control" placeholder="Enter Payment Provider name" required />
                    </div>

                    <div class="mb-3">
                        <label for="email-field" class="form-label">Processor Country</label>
                        <input type="email" id="processor_country" class="form-control" placeholder="Payment Processor Country" required />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label" style="">Property</label>
                        <select id="property_id" class=" form-control" style="width:100%">
                            <option>Search Property</option>
                            @foreach ($properties as $property)
                            <option value="{{$property->id}}">{{$property->title}}</option>
                            @endforeach
                        </select>


                    </div>

                    <div class="mb-3">
                        <label for="date-field" class="form-label">Account Number</label>
                        <input type="text" id="property_account" class="form-control" placeholder="Link a property to this payment method" required />

                    </div>


                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="saveMethod()" class="btn btn-success" id="add-btn">Add Customer</button>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('components.footer')
<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>

<script>
    $(function(){
     $('#property_id').select2({
       dropdownParent: $('#showModal')
     });
   });
   </script>

<script>

    function saveMethod(){
     let processor_name=$('#processor_name').val();
     let processor_country=$('#processor_country').val();
     let property_id=$('#property_id').val();
     let property_account=$('#property_account').val()

 $.ajax({
            url: "{{route('processor.store')}}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                processor_name,
                processor_country,
                property_id,
                property_account
            },
            success: function(response) {
                // hide modal
                $('#showModal').modal('hide');
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
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        });

    }
</script>
@endsection

