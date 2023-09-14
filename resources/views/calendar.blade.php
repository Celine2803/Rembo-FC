<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- <title>Jquery Fullcalandar Integration with PHP and Mysql</title> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
  
  <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="meetupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">MeetUp title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text"class="form-control"id="title">
          <span id="titleError"class="text-danger"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="saveBtn"class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class='container'>
  <div class='row'>
    <h3 class='text-center mt-5'>RFC CALENDAR</h3>
    <div class='col-md-11 offset-1 mt-5 mb-5'>
     
        <div id='calendar'>

        </div>
    </div>
  </div>

  </div>
  
  
  
  
  
  
  
  
  
  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script>
    
   
    $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let meetup = {!! json_encode($events) !!};

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: meetup,
        selectable: true,
        selectHelper: true,
        editable: true,
        select: function(start, end, allDays) {
            // Show the modal when a selection is made
            $('#meetupModal').modal('toggle');
        },
        eventDrop: function(event, delta, revertFunc) {
            let id = event.id;
            let start_date = moment(event.start).format('YYYY-MM-DD');
            let end_date = moment(event.end).format('YYYY-MM-DD');

            $.ajax({
                url: "{{ route('calendar.update','') }}"+'/' + id,
                type: "PATCH",
                dataType: "json",
                data: {
                    // _token: '{{ csrf_token() }}',
                    start_date: start_date,
                    end_date: end_date
                },
                success: function(response) {
                  swal("Good job!", "Event Updated!", "success");
                },
                error: function(error) {
                    console.log(error);
                    revertFunc();
                },
            });
        },
        // to remove the meetup
        eventClick: function(event) {
    if (confirm('Are you sure you want to remove it')) {
        let id = event.id; // Extract the event's ID from the clicked event
        $.ajax({
            url:  "{{ route('calendar.destroy','') }}"+'/' + id,
            type: "DELETE",
            dataType: "json",
            success: function(response) {
                $('#calendar').fullCalendar('removeEvents',response);
                swal("Good job!", "Event Deleted!", "success");
            },
            error: function(error) {
                console.log(error);
            },
        });
    }
},
// long event


    });

    // Handle the save button click outside the select event
    $('#saveBtn').click(function() {
        let title = $('#title').val();
       let start = $('#calendar').fullCalendar('getView').start;
        let end = $('#saveBtn').data('end');
        let start_date = moment(start).format('YYYY-MM-DD');
        console.log(start_date);
        let end_date = moment(end).format('YYYY-MM-DD');

        $.ajax({
            url: "{{ route('calendar.store') }}",
            type: "POST",
            dataType: "json",
            data: {
                // _token: '{{ csrf_token() }}',
                title: title,
                start_date: start_date,
                end_date: end_date
            },
            success: function(response) {
                $('#meetupModal').modal('hide');

                $('#calendar').fullCalendar('renderEvent', {
                    'title': response.title,
                    'start': response.start_date,
                    'end': response.end_date,
                });
            },
            error: function(error) {
                if (error.responseJSON.errors) {
                    $('#titleError').html(error.responseJSON.errors.title);
                }
            },
        });
    });
});

    
  </script>
  


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</body>
</html>