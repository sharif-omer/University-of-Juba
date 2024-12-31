@include('dashboard.header')

   {{-- @include('dashboard.sidebar') --}}
   
    <!-- Basic Tables start -->
    <section class="section">
       
        <div class="card">
            <div class="card-header">
                <a href="{{route('course.create')}}" class="text-center btn btn-primary waves-effect waves-light float-end">Add Course</a>
                {{-- <a href="{{route('dashboard')}}" class="badge bg-info p-2 float-start">Back</a> --}}
                <a href="{{route('dashboard')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>

            </div>

            
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Credit Hours</th>
                            <th>Faculty</th>
                            <th>Deparment</th>
                            <th>Semester</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>


                    <tbody>
                        @php($i = 1)
                        @foreach ($course as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->course_name}} </td>
                            <td>{{$item->course_code}} </td>
                            <td>{{$item->credit_hours}} </td>
                            <td>{{$item->fuculty}} </td>
                            <td>{{$item->deparment}} </td>
                            <td>{{$item->semester}} </td>
                            <td>
                                <form action="{{route('course.edit', $item->id)}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary sm">
                                     <i class="fas fa-trash-alt"></i> 
                                    </button>
                                 </form> 
                            </td>
                            <td>
                                 <form action="{{route('course.destroy', $item->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Student ?');">
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
