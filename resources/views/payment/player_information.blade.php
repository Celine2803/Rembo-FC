
@extends('director.director_dashboard')
@section('director')

<div class="page-content">
<div class="container">
    <h2>Player Information</h2>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Phone: {{ $user->phone }}</p>
    <p>Team: {{ $user->team }}</p>
    <p>Amount: {{ $user->amount }}</p>

    <a href="{{ route('payment', $user->id) }}" class="btn btn-primary">Proceed to Payment</a>
</div>
</div>
@endsection
