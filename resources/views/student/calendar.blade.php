@include('dashboard.header') 
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        timer: 3000, // Auto close after 3 seconds
        showConfirmButton: false
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
        timer: 3000, // Auto close after 3 seconds
        showConfirmButton: false
    });
</script>
@endif
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


