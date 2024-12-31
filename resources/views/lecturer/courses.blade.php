@include('dashboard.header')

<div class="container">
    <h3 class="mt-10 text-center">Manage Courses</h3>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('lecturer.addCourse') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" id="course_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="course_code">Course Code</label>
            <input type="text" name="course_code" id="course_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="credit_hours">Credit Hours</label>
            <input type="text" name="credit_hours" id="credit_hours" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fuculty">Fuculty</label>
            <input type="text" name="fuculty" id="fuculty" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deparment">Deparment</label>
            <input type="text" name="deparment" id="deparment" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="text" name="semester" id="semester" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Course</button>
    </form>

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
