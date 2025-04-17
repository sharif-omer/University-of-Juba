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
    <h2 class="text-center">Lecturers Page</h2>  
    <div class="card mt-2">
        <div class="card-body">
            <table class="table" id="table1">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                        @php($i = 1)
                        @foreach ($lecturer as $Lecturer)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$Lecturer->name}} </td>
                            <td>{{$Lecturer->email}} </td>
                            <td>{{$Lecturer->phone_number}} </td>
                            <td> 
                                <form action="{{route('lecturer.edit', $Lecturer->id)}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary sm">
                                        <i class="fas fa-edit"></i> 
                                    </button>
                                </form> 
                            </td>
                            <td>
                                <form id="delete-form-{{$Lecturer->id}}" action="{{route('lecturer.destroy', $Lecturer->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="confirmDelete('delete-form-{{$Lecturer->id}}')" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> 
                                    </button>
                                </form> 
                            </td>                                 
                        </tr>
                     
                        @endforeach   
                    </table>
                    <a href="{{route('lecturer.create')}}" class="text-center btn btn-primary waves-effect waves-light">Add Lecturers</a>
                    <a href="{{route('dashboard')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
        </div>
    </div>
</div>


@include('dashboard.footer')  