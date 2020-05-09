@extends('layouts.backend')

@section('content')
    <div class="tile">
        <div class="invoice">
            <div class="row justify-content-between mb-4">
                <div class="col-6">
                	<div class="float-left">
    	                <b>{{ $order->name }} </b><br>
                        <b>{{ $order->phone_no }} </b><br>
    	                <b>{{ $order->email }} </b><br>
    	                <b>{{ $order->address }} </b>
                	</div>
                </div>
                <div class="col-6">
                	<div class="float-right">
                		<b>Date: {{ $order->created_at->format('m/d/Y') }}</b><br>
    	                <b>Order ID:{{ $order->slug }}</b><br>
    	                <b>Account: {{ $order->payment_id }}</b><br>
    	                <b>Transation: {{ $order->transaction_id }}</b>
                	</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#Serial</th>
                                <th>Name</th>
                                <th>Writer</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($order->order_item as $orderitem)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $orderitem->book->name }}</td>
                                <td>{{ $orderitem->book->writer->name }}</td>
                                <td>{{ $orderitem->quantity }}</td>
                                <td>{{ $orderitem->subtotal }} TK.</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row d-print-none mt-2">
            <div class="col-6 text-right">
                <a class="btn btn-primary float-left" href="javascript:window.history.back();">
                     Back
                </a>
            </div>
            <div class="col-6">
                <a class="btn btn-primary float-right" href="{{ route('pdf', $order->slug) }}">
                    <i class="fa fa-download"></i> Download Pdf
                </a>
            </div>
        </div>
    </div>

@endsection