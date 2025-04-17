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
<div class="container"> 
    <h2 class="text-center">Calendar Page</h2>  
    <div class="card mt-2">
        <div class="card-body">
         <table class="table" id="table1">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Event Type</th>
                        <th>Academic Year</th>
                        <th>Semester</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                        @php($i = 1)
                        @foreach ($calendar as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->title}} </td>
                            <td>{{$item->description}} </td>
                            <td>{{$item->event_type}} </td>
                            <td>{{$item->academic_year}} </td>
                            <td>{{$item->semester}} </td>
                            <td>{{$item->start_time}} </td>
                            <td>{{$item->end_time}} </td>
                            <td>
                                <form action="{{route('calendar.edit', $item->id)}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary sm">
                                    <i class="fas fa-edit"></i> 
                                    </button>
                                 </form> 
                            </td>
                            <td>
                                 <form id="delete-form-{{ $item->id }}" action="{{ route('calendar.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="confirmDelete({{ $item->id }})">
                                        <i class="fas fa-trash-alt"></i> 
                                    </button>
                                </form>
                                
                                <script>
                                    function confirmDelete(id) {
                                        Swal.fire({
                                            title: 'هل أنت متأكد؟',
                                            text: "لن تتمكن من استعادة هذا السجل!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'نعم، احذفه!',
                                            cancelButtonText: 'إلغاء'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                document.getElementById('delete-form-' + id).submit();
                                            }
                                        });
                                    }
                                    </script>
                           </td>                                   
                        </tr>

                        @endforeach   
                </table>
                <a href="{{route('calendar.create')}}" class="text-center btn btn-primary waves-effect waves-light">Create Calendar</a>
                <a href="{{route('dashboard')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
      </div>
  </div>
</div>
    @include('dashboard.footer')   
