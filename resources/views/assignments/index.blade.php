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

<div class="side sidebar sidebar-menu-list">
    
</div>
<section>
    <div class="container mt-2"> 
<div class="card-body">
   <table class="table" id="table1">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Datline</th>
                  <th>Update</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
                  @php($i = 1)
                  @foreach ($assignments as $assignment)
                  <tr>
                      <td>{{$i++}}</td>
                      <td>{{$assignment->title}} </td>
                      <td>{{$assignment->description}} </td>
                      <td>{{$assignment->deadline}} </td>
                      <td> 
                          <form action="{{route('assignment.edit', $assignment->id)}}" method="GET">
                              @csrf
                              @method('GET')
                              <button type="submit" class="btn btn-primary sm">
                               <i class="fas fa-edit"></i> 
                              </button>
                           </form> 
                      </td>
                      <td>
                          <form id="delete-form-{{$assignment->id}}" action="{{route('assignment.destroy', $assignment->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" onclick="confirmDelete('delete-form-{{$assignment->id}}')" class="btn btn-danger">
                               <i class="fas fa-trash-alt"></i> 
                              </button>
                           </form> 
                      </td>                                 
                  </tr>
                  
                  @endforeach   
                </table>
                <hr/>
             <p>
                Adding New Assignment
                <br/>
                 <a href="{{route('assignments.create')}}" class="text-center btn btn-primary waves-effect waves-light">Add</a>
             </p>
                <p>
                   Show Studens Answer Assignment
                   <br/>
                    <a href="{{route('assignments.submissions', $assignment->id)}}" class="text-center btn btn-primary waves-effect waves-light">Show</a>
                </p>
                <p>
                   Show Studens Answer Assignment
                   <br/>
                    {{-- <a href="{{route('gradings.create', $submission)}}" class="text-center btn btn-primary waves-effect waves-light">Show</a> --}}
                </p>
    <p>
        Back To Home Page
        <br/>
        <a href="{{route('dashboard')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
    </p>
      </div>
</section>
  
    @include('dashboard.footer')   
</div>

