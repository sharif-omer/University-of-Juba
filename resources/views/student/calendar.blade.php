
@include('dashboard.header') 
<div class="container mt-4">
    <h3>Academic Calendar</h3>

     <div class="card-body">
         <table class="table" id="table1">
                <thead>
                    <tr>
                            <th>Date</th>
                            <th>Event</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event['date'] }}</td>
                            <td>{{ $event['event'] }}</td>
                        </tr>
                        @endforeach   
                </tbody>
          </table>
      </div>
      <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
</div>


