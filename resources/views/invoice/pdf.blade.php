<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap.min.css">
    <title>Invoice</title>

    <style>
        .invoice-head td {
            padding: 0 8px;
        }

        .container {
            padding-top: 30px;
        }

        .invoice-body {
            background-color: transparent;
        }

        .invoice-thank {
            margin-top: 60px;
            padding: 5px;
        }

        address {
            margin-top: 15px;
        }


        .watermark_container {
            position: fixed;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .watermark {
            font-size: 14rem;
            font-weight: 700;
            text-transform: uppercase;
            position: absolute;
            color: #666;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            opacity: 0.075;
        }
    </style>
</head>

<body>
    <div class="watermark_container">
        <div class="watermark">
            @if ($invoice->payment_id)
                PAID
            @else
                UNPAID
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="span4">
            <h2 style="color: #5dd95d">RentX <span style="color: #0b2a97">Systems</span> </h2>
                <address>
                    <strong>{{$invoice->tenant->unit->property->title}}</strong><br>

                {{$invoice->tenant->address}}
                </address>
            </div>
            <div class="span4 well">
                <table class="invoice-head">
                    <tbody>
                        <tr>
                            <td class="pull-right"><strong>Customer #</strong></td>
                            <td>{{$invoice->tenant->tenant_name}}</td>
                        </tr>
                        <tr>
                            <td class="pull-right"><strong>Invoice #</strong></td>
                            <td>{{$invoice->ref_number}}</td>
                        </tr>
                        <tr>
                            <td class="pull-right"><strong>Date</strong></td>
                            <td>{{Carbon\Carbon::parse($invoice->created_at, 'UTC')->isoFormat('MMMM Do YYYY')}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="span8">
                <h2>Invoice</h2>
            </div>
        </div>
        <div class="row">
            <div class="span8 well invoice-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Month</th>
                            <th>Dates</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>House Rent</td>
                            <td>{{Carbon\Carbon::parse($invoice->start_date)->format('F')}}</td>
                            <td>
                                <span>{{Carbon\Carbon::parse($invoice->start_date, 'UTC')->format('F Y')}}</span>
                               -
                               <span>{{Carbon\Carbon::parse($invoice->end_date, 'UTC')->format('F Y')}}</span>
                           </td>
                            <td>{{$invoice->amount}}</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><strong>Total</strong></td>
                            <td><strong>{{$invoice->amount}}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>



    </div>
    <div class="row">
    </div>
    </div>
</body>

</html>
