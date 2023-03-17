@extends('doctor.template')
@section('title', 'Appointments Calendar')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('../assets/plugins/fullcalendar/main.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body p-0">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div><!-- /.container-fluid -->
  </section>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new appointment</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <input type="hidden" id="event_id">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
              <label for="patient">Patient</label>
              <select class="form-control" name="patient" id="patient">
                @foreach ($patients as $patient )
                <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter patient phone number">
            </div>
            <div class="form-group">
              <label for="start">Start Date&Time</label>
              <input type="text" class="form-control" id="start" name="start" placeholder="Enter start date&time">
            </div>
            <div class="form-group">
              <label for="end">End Date&Time</label>
              <input type="text" class="form-control" id="end" name="end" placeholder="Enter end date&time">
            </div>
            <div class="form-group">
              <label for="description">Comments</label>
              <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="is_all_day" name="is_all_day" checked>
              <label class="form-check-label" for="is_all_day">All day</label>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger mr-auto" style="display: none" id="deleteEventBtn" onclick="deleteEvent()">Delete Event</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="submitEventFormData()">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
@section('custom-js')

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script>
    var calendar = null;
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
            initialDate: new Date(),
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: '{{route('refetch-appointments')}}',
            dateClick: function(info){
              let startDate, endDate, allDay;
              allDay = $('#is_all_day').prop('checked');
              if(allDay){
                  startDate = moment(info.date).format("YYYY-MM-DD");
                  endDate = moment(info.date).format("YYYY-MM-DD");
                  initializeStartDateEndDateFormat('Y-m-d', true);
              }else{
                initializeStartDateEndDateFormat("Y-m-d H:i", false);
                startDate = moment(info.date).format("YYYY-MM-DD HH:mm:ss");
                endDate = moment(info.date).add(30, 'minutes').format("YYYY-MM-DD HH:mm:ss");
              }
              $('#start').val(startDate);
              $('#end').val(endDate);
              modalReset();
              $('#modal-default').modal('show');
            },
            eventClick: function(info){
                modalReset();
                const event = info.event;
                $('#title').val(info.event.title);
                $('#event_id').val(info.event.id);
                $('#description').val(event.extendedProps.description);
                $('#patient').val(event.extendedProps.patient_id);
                $('#phone').val(event.extendedProps.phone);
                $('#start').val(event.extendedProps.startDay);
                $('#end').val(event.extendedProps.endDay);
                $('#is_all_day').prop('checked', event.allDay);
                $('#modal-default').modal('show');
                $('#deleteEventBtn').show();
                if(info.event.allDay){
                    initializeStartDateEndDateFormat("Y-m-d", true);
                }else{
                    initializeStartDateEndDateFormat("Y-m-d H:i", false);
                }
            }
        });
        calendar.render();
        $('#is_all_day').change(function(){
          let is_all_day = $(this).prop('checked');
          if(is_all_day){
            let start = $('#start').val().slice(0,10);
            $('#start').val(start);
            let end = $('#end').val().slice(0,10);
            $('#end').val(end);
            initializeStartDateEndDateFormat('Y-m-d', is_all_day);
          }else{
            let start = $('#start').val().slice(0,10);
            $('#start').val(start + " 00:00");
            let end = $('#end').val().slice(0,10);
            $('#end').val(end + " 00:30");
            initializeStartDateEndDateFormat('Y-m-d H:i', is_all_day);
          }
        })
      });

      function initializeStartDateEndDateFormat(format, allDay){
        let timePicker = !allDay;
        $('#start').datetimepicker({
          format:format,
          timepicker: timePicker
        });
        $('#end').datetimepicker({
          format:format,
          timepicker: timePicker
        });
      }

      function modalReset(){
        $('#title').val('');
        $('#description').val('');
        $('#event_id').val('');
        $('#deleteEventBtn').hide();
      }

      function submitEventFormData(){
        let eventId = $('#event_id').val();
        let url = '{{ route('calendar.store') }}'
        let postData = {
            title: $('#title').val(),
            description: $('#description').val(),
            start: $('#start').val(),
            end: $('#end').val(),
            is_all_day: $('#is_all_day').prop('checked') ? 1 : 0,
            patient_id: $('#patient').val(),
            phone: $('#phone').val(),

        };
        if(eventId){
            url = '{{url('/doctor')}}' + `/calendar/${eventId}`;
            postData._method = "PUT";
        }
        $.ajax({
          type:'POST',
          url: url,
          dataType: 'json',
          data:postData,
          success: function(res){
            if(res.success){
              calendar.refetchEvents();
              $('#modal-default').modal('hide');
            }else{
              alert('Something went wrong!')
            }
          }
        })
      }
      function deleteEvent(){
          if(window.confirm('Are you sure you want to delete this appointment?')){
              let eventId = $('#event_id').val();
              let url = '';
              if(eventId){
                  url= '{{url('/doctor')}}' + `/calendar/${eventId}`;
              }
              $.ajax({
                  type: 'DELETE',
                  url: url,
                  dataType: 'json',
                  data: {},
                  success: function(res){
                      if(res.success){
                          calendar.refetchEvents();
                          $('#modal-default').modal('hide');
                      }else{
                          alert('Something went wrong!')
                      }
                  }
              });
          }
      }
</script>
@endsection
