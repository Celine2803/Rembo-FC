
@extends('director.director_dashboard')
@section('director')

<div class="page-content">

<div class="container">
    <h2 class="text-success pt-4 text-center">Payment Successful</h2>
    <hr>
    <p class="text-center"><span class="text-primary">Name: </span> {{ $user->name }}</p>
    <p class="text-center"><span class="text-primary">Phone: </span>{{ $user->phone }}</p>
    <p class="text-center"><span class="text-primary">Amount Paid: </span> {{ $user->amount }}</p>

    <p class="text-center">Thank you for your payment!</p>

    <div class="text-center">
        <a href="{{ route('payment.receipt',['id' => $user->id]) }}" target="_blank">Generate Receipt</a>

        <a href="{{ route('director.dashboard') }}" class="btn btn-primary">Finish</a>
    </div>
</div>
</div>
@endsection
