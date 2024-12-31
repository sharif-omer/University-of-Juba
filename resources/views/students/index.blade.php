@include('dashboard.header')

   {{-- @include('dashboard.sidebar') --}}
   
    <!-- Basic Tables start -->
    <section class="section">
       
        <div class="card">
            <div class="card-header">
                <a href="{{route('student.create')}}" class="text-center btn btn-primary waves-effect waves-light float-end">Add Students</a>
                {{-- <a href="{{route('dashboard')}}" class="badge bg-info p-2 float-start">Back</a> --}}
                <a href="{{route('dashboard')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>

            </div>

            
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Student Id</th>
                            <th>Faculty</th>
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
                            <td>{{$Student->name}} </td>
                            <td>{{$Student->student_id}} </td>
                            <td>{{$Student->faculty}} </td>
                            <td>{{$Student->semester}} </td>
                            <td>{{$Student->enrollment_year}} </td>
                            <td>{{$Student->year}} </td>
                            <td>
                                <form action="{{route('student.edit', $Student->id)}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary sm">
                                     <i class="fas fa-trash-alt"></i> 
                                    </button>
                                 </form> 
                            </td>
                            <td>
                                 <form action="{{route('student.destroy', $Student->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Student ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger sm">
                                     <i class="fas fa-trash-alt"></i> 
                                    </button>
                                 </form> 
                          </td>                                   
                        </tr>
                        @endforeach
                    {{-- <tbody>     
                        <tr>
                            <td>1</td>
                            <td>Sharif Omer</td>
                            <td>sharifomer@gmail.com</td>
                            <td>07624 869434</td>
                            <td>
                              <span class="badge bg-success">Active</span>
                            </td>
                            <td><a href="#" class="badge bg-info">Edit</a></td>
                            <td><a href="#" class="badge bg-danger">Delete</a></td> 
                        </tr>
                        
                        
                        <tr>
                            <td>2</td>
                            <td>Tarir Abdon</td>
                            <td>tarir@gmail.com</td>
                            <td>07624 869434</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td><a href="#" class="badge bg-info">Edit</a></td>
                            <td><a href="#" class="badge bg-danger">Delete</a></td>
                        </tr>
                    </tbody> --}}
                </table>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
</div>  

        </div>
    </div>
    

    @include('dashboard.footer')
    
</body>

</html>
