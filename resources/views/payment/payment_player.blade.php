@extends('director.director_dashboard')
@section('director')

<div class="page-content">
    <div class="row profile-body">
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Pay Player</h6>

	<form class="forms-sample" method="POST" action="{{route('player.process', $user->id)}}">
         @csrf

    <input type="hidden" name="id" value="{{ $user->id }}">

        <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}"> 
        </div>

        <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" value="{{$user->email}}">
        </div>

       <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" value="{{$user->phone}}"> 
        </div>

        <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Team</label>
            <input type="text" name="team" class="form-control" value="{{$user->team}}"> 
        </div>

        <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{$user->amount}}"> 
        </div>

        <button type="submit" class="btn btn-primary me-2">
            Proceed</button>
				
	</form>
    </div>
   </div>
  </div>
</div>
</div>

@endsection