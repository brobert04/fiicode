@extends('doctor.template')
@section('title', 'Medicool | Doctor Dashboard')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <h1>Hello, {{ auth()->user()->name }}!
      @if(auth()->user()->doctor->gender === "female")
      <span>👩‍⚕️</span>
      @else
      <span>👨🏻‍⚕️</span>
      @endif
    </h1>
    <br>
    <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ auth()->user()->doctor->patients->count() }}</h3>
              <p>Patients</p>
            </div>
            <div class="icon">
              <i class="ion ion-user"></i>
            </div>
            <a href="{{ route('doctor.patients') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ auth()->user()->doctor->appointments->count() }}</h3>
              <p>Appointments</p>
            </div>
            <div class="icon">
              <i class="ion ion-calendar"></i>
            </div>
            <a href="{{ route('calendar.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="ion ion-calendar mr-1"></i>
                    Calendar
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="calendar" id="calendar"></div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                To Do List
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row" style="clear: both;margin-top: 18px;">
                  <div class="col-12">
                  <ul class="todo-list" data-widget="todo-list" id="todo-list">
                    @empty($invitations)
                    @else
                    @foreach ($todos as $todo )
                    <li id="todo_{{ $todo->id }}">
                      <!-- drag handle -->
                      <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <!-- todo text -->
                      <span class="text">{{ $todo->todo }}</span>
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <a href="javascript:deleteTodo({{ $todo->id }})" style="cursor: pointer">
                          <i class="fas fa-trash"></i>
                        </a>
                        {{-- <button class="btn btn-danger" onclick="deleteTodo({{ $todo->id }})"><i style="color:white" class="fas fa-trash"></i></button> --}}
                      </div>
                    </li>
                    @endforeach
                    @endempty
                  </ul>
              </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#addTodoModal"><i class="fas fa-plus"></i> Add item</button>
            </div>
          </div>
        </div> 
    </div>

 <div class="modal fade" id="addTodoModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Todo</h4>
            </div>
            <div class="modal-body">
    
                    <div class="form-group">
                        <label for="name" class="col-sm-2">Task</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="task" name="todo" placeholder="Enter task">
                            <span id="taskError" class="alert-message"></span>
                        </div>
                    </div>
    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="addTodo()">Save</button>
            </div>
        </div>
      </div>
      
    </div>
@endsection
@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            editable:true,
            // dateClick: function(info){
            //   let startDate, endDate, allDay;
            //   allDay = $('#is_all_day').prop('checked');
            //   if(allDay){
            //       startDate = moment(info.date).format("YYYY-MM-DD");
            //       endDate = moment(info.date).format("YYYY-MM-DD");
            //       initializeStartDateEndDateFormat('Y-m-d', true);
            //   }else{
            //     initializeStartDateEndDateFormat("Y-m-d H:i", false);
            //     startDate = moment(info.date).format("YYYY-MM-DD HH:mm:ss");
            //     endDate = moment(info.date).add(30, 'minutes').format("YYYY-MM-DD HH:mm:ss");
            //   }
            //   $('#start').val(startDate);
            //   $('#end').val(endDate);
            //   modalReset();
            //   $('#modal-default').modal('show');
            // },
            // eventClick: function(info){
            //     console.log(info);
            //     modalReset();
            //     const event = info.event;
            //     $('#title').val(info.event.title);
            //     $('#event_id').val(info.event.id);
            //     $('#description').val(event.extendedProps.description);
            //     $('#patient').val(event.extendedProps.patient_id);
            //     $('#phone').val(event.extendedProps.phone);
            //     $('#start').val(event.extendedProps.startDay);
            //     $('#end').val(event.extendedProps.endDay);
            //     $('#is_all_day').prop('checked', event.allDay);
            //     $('#modal-default').modal('show');
            //     $('#deleteEventBtn').show();
            //     if(info.event.allDay){
            //         initializeStartDateEndDateFormat("Y-m-d", true);
            //     }else{
            //         initializeStartDateEndDateFormat("Y-m-d H:i", false);
            //     }
            // },
            // eventDrop:function(info){
            //     const event = info.event;
            //     resizeEventUpdate(event);
            // },
            // eventResize:function(info){
            //     const event = info.event;
            //     resizeEventUpdate(event);
            // }
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
</script>
<script>

  function addTodo() {
      var task = $('#task').val();
      let _url     = `/doctor/todo`;
      let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
          url: _url,
          type: "POST",
          data: {
              todo: task,
              _token: _token
          },
          success: function(data) {
                  todo = data
                  $('#todo-list').append(
                    `
                      <li id="todo_${ todo.id }">
                      <!-- drag handle -->
                      <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <!-- todo text -->
                      <span class="text">${ todo.todo }</span>
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <a href="javascript:deleteTodo(${ todo.id })" style="cursor: pointer">
                          <i class="fas fa-trash"></i>
                        </a>
                      </div>
                    </li>
                  `);

                  $('#task').val('');

                  $('#addTodoModal').modal('hide');
          },
          error: function(response) {
              $('#taskError').text(response.responseJSON.errors.todo);
          }
      });
  }

  function deleteTodo(id) {
      let url = `/doctor/todo/${id}`;
      let token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
          url: url,
          type: 'DELETE',
          data: {
          _token: token
          },
          success: function(response) {
              $("#todo_"+id).remove();
          }
      });
  }

</script>
@endsection
