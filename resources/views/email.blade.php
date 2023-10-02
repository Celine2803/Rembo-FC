@extends('director.director_dashboard')
@section('director')

<div class="page-content">
    <div class="row profile-body">
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="card">
                <div class="card-body">
                    <!-- Form for sending individual email -->
                    <h6 class="card-title">Email A Specific Player</h6>
                    <form class="forms-sample" method="POST" action="{{ route('send.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Select Player:</label>
                            <select name="user_id" id="user_id" class="form-select">
                                @foreach($user as $individualUser)
                                    <option value="{{ $individualUser->id }}">{{ $individualUser->name }} (ID: {{ $individualUser->id }})</option>
                                @endforeach
                            </select>
                        </div>

                        

                        <div class="mb-3">
                            <label for="exampleInputTextarea" class="form-label">Email Message:</label>
                            <textarea name="notes" id="notes" class="form-control" rows="4"></textarea>
                        </div>

                        @error('user_id')
                        <span>{{ $message }}</span>
                        @enderror

                        <button type="submit"name="send_individual" class="btn btn-primary me-2">Send</button>
                    </form>
                    <br>
                    {{-- Sending email to all players --}}
                    <h6 class="card-title">Email Players</h6>

                    <form class="forms-sample" method="POST" action="{{ route('send.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputTextarea" class="form-label">Email Message to All Players:</label>
                            <textarea name="message_all" id="message_all" class="form-control" rows="4"></textarea>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="exampleInputTextarea" class="form-label">Additional Notes:</label>
                            <textarea name="notes" id="notes" class="form-control" rows="4"></textarea>
                        </div> --}}
                        
                        {{-- @error('email') --}}
                        @error('message_all')
                        <span>{{ $message }}</span>
                        @enderror

                        <button type="submit" name="send_group" class="btn btn-primary me-2">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
