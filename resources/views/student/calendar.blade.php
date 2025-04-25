@include('dashboard.header') 

<div class="container mt-4">
    <h3 class="text-center">Academic Calendar</h3>

     <div class="card-body">
         <table class="table" id="table1">
                <thead class="bg-light">
                    <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>description</th>
                            <th>Event Type</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                    </tr>
                </thead>
                <tbody>
                     @php($i = 1)
                        @foreach($calendars as $calendar)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$calendar->title }}</td>
                            <td>{{$calendar->description }}</td>
                            <td>{{$calendar->event_type }}</td>
                            <td>{{$calendar->start_time }}</td>
                            <td>{{$calendar->end_time }}</td>
                        </tr>
                        @endforeach   
                </tbody>
          </table>
      </div>
      <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
</div>


