@extends('director.director_dashboard');
@section('director')

<div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Welcome to your Dashboard</h2>
      </div>
    </div>
    <div class="container">
        <h1>Members</h1>
        <table id="myDataTable" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Team</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td style="color:black">{{ $user->id }}</td>
                        <td style="color:black">{{ $user->name }}</td>
                        <td style="color:black">{{ $user->team}}</td>
                        <!-- Add more columns as needed -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
@endsection