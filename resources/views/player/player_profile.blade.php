@extends('player.player_dashboard')
@section('player')


<div class="page-content">

    <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  
                    <div class="avatar"><img src="{{ (!empty($profileData->photo)) ? 
                        url('upload/player_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="..." class="wd-40 img-fluid rounded-circle">
                      </div>
                    </div>
               
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                  <p class="text-muted">{{$profileData->name}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                  <p class="text-muted">{{$profileData->email}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                  <p class="text-muted">{{$profileData->phone}}</p>
                </div>

              </div>
            </div>
          </div>
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <div class="card">
        <div class="card-body">
            <h3 class="text-primary mb-3">Update your Details</h3>

     <form class="forms-sample" enctype="multipart/form-data" method="POST" 
        action="{{route('coach.profile.store')}}">
        @csrf

	<div class="mb-3">
		<label for="exampleInputUsername1" class="form-label">Username</label>
		<input type="text" name="username" class="form-control" id="exampleInputUsername1" 
        autocomplete="off" value="{{$profileData->username}}">
	</div>

    <div class="mb-3">
		<label for="exampleInputUsername1" class="form-label">Name</label>
		<input type="text" name="name" class="form-control" id="exampleInputUsername1" 
        autocomplete="off" value="{{$profileData->name}}">
	</div>

	<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Email address</label>
		<input type="email" name="email" class="form-control" id="exampleInputEmail1"
        autocomplete="off" value="{{$profileData->email}}">
	</div>

    <div class="mb-3">
		<label for="exampleInputUsername1" class="form-label">Phone</label>
		<input type="number" name="phone" class="form-control" id="exampleInputUsername1" 
        autocomplete="off" value="{{$profileData->phone}}">
	</div>

    <div class="mb-3">
		<label for="exampleInputPassword1" class="form-label">Photo</label>
		<input type="file" name="photo" class="form-control" id="formFile" 
        autocomplete="off" value="{{$profileData->photo}}">
	</div>

	<button type="submit" class="btn btn-primary me-2">Save</button>
				
	</form>
</div>
</div>
</div>
</div>
</div>

@endsection