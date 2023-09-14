@extends('director.director_dashboard')
@section('director')

<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                        <a href="{{ route('add.player')}}" class="btn btn-inverse-info">+ Add Player</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All Players</h6>
                
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Image</th>
                        <th>email</th>
                        <th>Phone Number</th>
                        <th>Team</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($allplayers as $key => $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <img class="rounded-circle" src="{{ (!empty($item->photo)) ? 
                            url('upload/player_images'.$item->photo) : 
                            url('favicon.ico') }}" alt="profile">
                        </td>
                        
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->team }}</td>
                        <td>
                            <a href="{{ route('edit.player', $item->id)}}" class="btn btn-inverse-warning">Edit</a>
                            <a href="{{ route('softdelete.player', $item->id)}}" class="btn btn-inverse-danger">Delete</a>
                            <a href="{{ route('pay.player', $item->id)}}" class="btn btn-inverse-danger">Pay</a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
					</div>
				</div>

			</div>

@endsection