@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">


                <h4 class="card-title">Payment Wizard</h4>
                <p class="card-title-desc">Please fill in details to pay</p>

                <form id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                    <h3>Invoice Details</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Search Invoice</label>
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                        {{-- <input id="search-invoice" name="" type="text" class="form-control select2"> --}}
                                        <select onchange="searchInvoice()" id="invoice" class="form-select">
                                            <option>Search Invoice</option>
                                            @foreach ($invoices as $invoice)
                                            <option value="{{$invoice->id}}">{{$invoice->ref_number}}</option>
                                            @endforeach
                                        </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtLastNameBilling" class="col-lg-3 col-form-label">Tenant Name</label>
                                    <div class="col-lg-9">
                                        <input disabled id="tenant_name" name="" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtCompanyBilling" class="col-lg-3 col-form-label">Unit Number</label>
                                    <div class="col-lg-9">
                                        <input disabled id="unit_number" name="txtCompanyBilling" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Rent Start Date</label>
                                    <div class="col-lg-9">
                                        <input disabled id="start_date" name="txtEmailAddressBilling" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtAddress1Billing" class="col-lg-3 col-form-label">Rent End date</label>
                                    <div class="col-lg-9">
                                        <input disabled id="end_date" name="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtAddress2Billing" class="col-lg-3 col-form-label">Invoice Amount</label>
                                    <div class="col-lg-9">
                                        <input disabled id="invoice_amount" name="" class="form-control">

                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtCityBilling" class="col-lg-3 col-form-label">Payment Status</label>
                                    <div class="col-lg-9">
                                        <input disabled id="payment_status" name="" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtStateProvinceBilling" class="col-lg-3 col-form-label">Invoice Due Date</label>
                                    <div class="col-lg-9">
                                        <input disabled id="due_date" name="" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- payment details --}}

                    </fieldset>
                    <h3>Payment Details</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Payment Method</label>
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                        {{-- <input id="search-invoice" name="" type="text" class="form-control select2"> --}}
                                        <select onchange="searchProcessor()" id="processor_id" class="form-select">
                                            <option>Search Payment Method</option>
                                        </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="ddlCreditCardType" class="col-lg-3 col-form-label">Processor Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" id="processor_name" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtCreditCardNumber" class="col-lg-3 col-form-label">Processor Country</label>
                                    <div class="col-lg-9">
                                        <input id="processor_country" name="" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtCardVerificationNumber" class="col-lg-3 col-form-label">A/C Number/Paybill</label>
                                    <div class="col-lg-9">
                                        <input id="property_account" name="" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtCreditCardNumber" class="col-lg-3 col-form-label">Amount</label>
                                    <div class="col-lg-9">
                                        <input id="amount_to_pay" name="" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </fieldset>
                    <h3>Complete Payment</h3>
                    <fieldset>
                        <div class="p-3">
                            <div class="col-md-6">
                                <label class="form-label" for="customCheck1">Payment Reference Code</label>

                                <input type="text" class="form-control" id="ref_number">
                            </div>
                        </div>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>
</div> <!-- row end -->

@include('components.footer')
<script src="{{asset('assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
<!-- form wizard init -->

 <script>
    $(function () {
    $("#form-horizontal").steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slide",
        onFinished: function (event, currentIndex)
        {
            // alert("Submitted!");
            savePayment();

        }
    });
    $('#invoice').select2()
});
 </script>

<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/ecommerce-select2.init.js')}}"></script>
    <!-- form wizard -->
<script>
    function searchInvoice(){
        var invoice_id = $('#invoice').val();
        url='/invoice/retrieve?iid=:id';
        url = url.replace(':id', invoice_id);
        let tenant_name=$('#tenant_name');
        let unit_number=$('#unit_number');
     let amount_to_pay=$('#amount_to_pay');

        let start_date=$('#start_date');
        let end_date=$('#end_date');
        let invoice_amount=$('#invoice_amount');
        let payment_status=$('#payment_status');
        let due_date=$('#due_date');

 $.ajax({
            url: url,
            type: 'GET',
            data: {
                _token: "{{ csrf_token() }}",

            },
            success: function(response) {


                tenant_name.val(response.invoice.tenant.tenant_name);
                unit_number.val(response.invoice.unit.unit_number);
                start_date.val(response.invoice.start_date)
                end_date.val(response.invoice.end_date)
                due_date.val(response.invoice.due_date)
                invoice_amount.val(response.invoice.amount)
                amount_to_pay.val(response.invoice.amount)
                payment_status.val(response.invoice.payment_status)

                // populate payment processors
                response.processors.forEach(function(name){
                    console.log( name.id);
                    var option = "<option value='"+name.id+"'>"+name.processor_name+"</option>";

                        $("#processor_id").append(option);

            });

            }
        });

    }

function searchProcessor(){
    var processor_id = $('#processor_id').val();
    url='/processor/retrieve?pid=:id';
    url = url.replace(':id', processor_id);
    let processor_name=$('#processor_name');
    let processor_country=$('#processor_country');
    let property_account=$('#property_account');

    $.ajax({
            url: url,
            type: 'GET',
            data: {
                _token: "{{ csrf_token() }}",

            },
            success: function(response) {


                processor_name.val(response.processor.processor_name);
                processor_country.val(response.processor.processor_country);
                property_account.val(response.processor.property_account)

            }
        });
}

    function savePayment(){
     let processor_id=$('#processor_id').val();
     let invoice_id=$('#invoice').val();
     let ref_number=$('#ref_number').val();
     let amount=$('#amount_to_pay').val();




 $.ajax({
            url: "{{route('payment.store')}}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                processor_id,invoice_id,ref_number,amount
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
