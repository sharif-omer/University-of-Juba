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
    <section class="section">    
            {{-- <div class="card-header">
                
            </div>     --}}
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Student Id</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Credit Hours</th>
                            <th>Semster</th>
                            <th>Grade</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php($i = 1)
                        @foreach ($result as $results)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$results->student->user->name}} </td>
                            <td>{{$results->student->student_id}} </td>
                            <td>{{$results->course->name}} </td>
                            <td>{{$results->course->course_code}} </td>
                            <td>{{$results->course->credit_hours}} </td>
                            <td>{{$results->semester}} </td>
                            <td>{{$results->grade}} </td>
                            <td>
                                <form action="{{route('results.edit', $results->id)}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary sm">
                                     <i class="fas fa-edit"></i> 
                                    </button>
                                 </form> 
                            </td>
                            <td>
                                <form id="delete-form-{{$results->id}}" action="{{route('results.destroy', $results->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="confirmDelete('delete-form-{{$results->id}}')" class="btn btn-danger">
                                        <i class="fas fa-trash-alt m-1"></i> 
                                       </button>
                                 </form> 
                          </td>                                   
                        </tr>
                        @endforeach           
                </table>
                <a href="{{route('results.create')}}" class="text-center btn btn-primary waves-effect waves-light">Isert Results</a>
                <a href="{{route('lecturer')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
            </div>
    </section>
</div>
</div>  

        </div>
    </div>
    @include('dashboard.footer')   
</body>
</html>
