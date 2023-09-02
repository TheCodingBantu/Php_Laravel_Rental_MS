@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Landlord/Agent</h4>
                <p class="card-title-desc">Fill all information below</p>

                <form >
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Name</label>
                                <input id="name" name="name" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="metakeywords">Email</label>
                                <input id="email" name="email" type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">User Type</label>

                                <select name="type" id="type" class="form-control">
                                    <option value="owner">Owner</option>
                                    <option value="manager">Manager</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="">Phone</label>
                                <input id="phone" name="phone" type="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">National ID</label>
                                <input id="id" name="id" type="number" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success waves-effect waves-light me-1" onclick="saveUser()">Save User</button>


                </form>

            </div>
        </div>
    </div>
</div>
@include('components.footer')
<script>
    function saveUser(){
    console.log('loaded function');
     let name=$('#name').val();
     let email=$('#email').val();
     let type=$('#type').val();
     let phone=$('#phone').val();
     let id=$('#id').val();

 $.ajax({
            url: "{{route('addUser')}}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                name: name,
                email: email,
                type: type,
                phone: phone,
                id: id
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
