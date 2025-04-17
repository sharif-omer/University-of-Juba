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

{{-- === --}}
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'نجاح!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

@if (session('delete'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'تم الحذف!',
            text: '{{ session('delete') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'خطأ!',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

<div class="container">   
    <h2 class="text-center">Students Page</h2>
    <div class="card mt-2">
        <div class="card-body">
            <table class="table" id="table1">
                <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Student Id</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Enrollment Year</th>
                            <th>Academic Year</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>                 
                    <tbody>
                        @php($i = 1)
                        @foreach ($student as $Student)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$Student->user->name}} </td>
                            <td>{{$Student->student_id}} </td>
                            <td>{{$Student->faculty}} </td>
                            <td>{{$Student->departments}} </td>
                            <td>{{$Student->current_semester}} </td>
                            <td>{{$Student->enrollment_year}} </td>
                            <td>{{$Student->current_year}} </td>
                            <td>
                                <form action="{{route('student.edit', $Student->id)}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary sm">
                                        <i class="fas fa-edit"></i> 
                                    </button>
                                </form> 
                            </td>
                            <td>
                                <form id="delete-form-{{ $Student->id }}" action="{{ route('student.destroy', $Student->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="confirmDelete({{ $Student->id }})">
                                        <i class="fas fa-trash-alt"></i> 
                                    </button>
                                </form>    
                            </td>                                   
                        </tr>
                        @endforeach   
                    </table>
                    <a href="{{route('student.create')}}" class="text-center btn btn-primary waves-effect waves-light">Add Students</a>
                    <a href="{{route('dashboard')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
                </div>
            </div>
        </div>
        @include('dashboard.footer')

                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      
