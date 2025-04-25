@include('dashboard.header')

<h2 class="text-center mt-1">Update <span class="text-info"> {{$course->name}}</span> Course</h2>
<div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('course.update', $course->id)}}">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" name="course_name" class="form-control" id="course_name" value="{{ old('course_name', $course->name)}}">
                </div>

                <div class="form-group">
                    <label for="course_code">Course Code</label>
                    <input type="text" name="course_code" id="course_code" class="form-control" value="{{ old('course_code', $course->course_code)}}">
                </div> 

                <div class="form-group">
                    <label for="credit_hours">Credit Hours</label>
                    <input type="text" name="credit_hours" id="credit_hours" class="form-control" value="{{ old('credit_hours', $course->credit_hours)}}">
                </div>

                <div class="form-group">
                    <label for="fuculty">Fuculty</label>
                    <input type="text" name="fuculty" id="fuculty" class="form-control" value="{{ old('fuculty', $course->fuculty)}}">
                </div>

                <div class="form-group">
                    <label for="deparment">Deparment</label>
                    <input type="text" name="deparment" id="deparment" class="form-control" value="{{ old('deparment', $course->deparment)}}">
                </div>

                {{-- <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" name="semester" id="semester" class="form-control" value="{{ old('semester', $course->semester)}}">
                </div> --}}
              
              <div class="text-center">
                <button type="submit" class="btn btn-primary waves-effect waves-light"> Save</button>
                <a href="{{route('course.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
            </div>
        </form>           
    </div>
</div>

