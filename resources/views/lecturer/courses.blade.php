
    <h4 class="m-5">Existing Courses</h4>

    <table class="table" id="table1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Credit Hours</th>
                <th>Fuculty</th>
                <th>Deparment</th>
                <th>Semester</th>
                
            </tr>
        </thead>
        <tbody>
                @php($i = 1)
                @foreach ($courses as $course)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$course->course_name}} </td>
                    <td>{{$course->course_code}} </td>
                    <td>{{$course->credit_hours}} </td>                                   
                    <td>{{$course->fuculty}} </td>                                   
                    <td>{{$course->deparment}} </td>                                   
                    <td>{{$course->semester}} </td>                                   
                </tr>
                @endforeach   
        </table>
        <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light mt-3">Back</a>
</div>
