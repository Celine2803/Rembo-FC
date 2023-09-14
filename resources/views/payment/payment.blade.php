
@extends('director.director_dashboard')
@section('director')

<div class="page-content">
<div class="container">
    <h2 class="text-center text-success pt-4">Payment Page</h2>
    <hr>
    <p class="text-center">
        Pay: <span class="text-primary">{{ $user->name }}</span> , of team <span class="text-primary"> {{ $user->team }}</span>  <br> Phone Number: <span class="text-primary">{{ $user->phone }}</span> ,
         KES: <span class="text-primary">{{ $user->amount }}</span> 
    </p>

    Pay with:
    <a href="{{route('stk.push')}}" class="btn btn-primary mb-3">M-PESA</a>
    <div class="text-center">
        <a href="{{ route('payment.success', $user->id) }}" class="btn btn-primary">Complete Payment</a>
    </div>
</div>
</div>
@endsection
