@include('dashboard.header')
        <div class="card-header">
            <h2 class="card-title text-center">Update {{$student->name}} Information</h2>
        </div>
<div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('student.update', $student->id)}}">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $student->name)}}">
                </div>

                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" name="student_id" id="student_id" class="form-control" value="{{ old('student_id', $student->student_id)}}">
                </div>  

                <div class="form-group">
                    <label for="faculty">Faculty</label>
                    <input type="text" name="faculty" id="faculty" class="form-control" value="{{ old('faculty', $student->faculty)}}">
                </div>

                <div class="form-group">
                    <label for="enrollment_year">Enrollment Year</label>
                    <input type="" name="enrollment_year" id="enrollment_year" class="form-control" value="{{ old('enrollment_year', $student->enrollment_year)}}">
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="" name="semester" id="semester" class="form-control" value="{{ old('semester', $student->semester)}}">
                </div>

                <div class="form-group">
                    <label for="year">Academic Year</label>
                    <input type="" name="year" id="year" class="form-control" value="{{ old('year', $student->year)}}">
                </div>
              <button type="submit" class="btn btn-primary waves-effect waves-light"> Save</button>
        </form>         
    </div>
</div>
