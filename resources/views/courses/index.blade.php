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
        <h2 class="text-center">Courses Page</h2>  
        <div class="card mt-2">
            <div class="card-body">
                <table class="table" id="table1">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Credit Hours</th>
                            <th>Faculty</th>
                            <th>Deparment</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($course as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->name}} </td>
                            <td>{{$item->course_code}} </td>
                            <td>{{$item->credit_hours}} </td>
                            <td>{{$item->fuculty}} </td>
                            <td>{{$item->deparment}} </td>
                            <td>
                                <form action="{{route('course.edit', $item->id)}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary sm">
                                     <i class="fas fa-edit"></i> 
                                    </button>
                                 </form> 
                            </td>
                            <td>
                                 <form action="{{route('course.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> 
                                   </button>
                                 </form> 
                                
                          </td>                                   
                        </tr>
                        @endforeach  
                </table> 
                <a href="{{route('course.create')}}" class="text-center btn btn-primary waves-effect waves-light">Add Course</a>
                <a href="{{route('dashboard')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
            </div>
        </div>
    </div>
    @include('dashboard.footer')

