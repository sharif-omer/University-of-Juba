@include('dashboard.header')
            <h2 class="text-center">Update <span class="text-info">{{$student->user->name}}</span> Information</h2>
<div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('student.update', $student->id)}}">
            @csrf
            @method('PUT')
               
                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" name="student_id" id="student_id" class="form-control" value="{{ old('student_id', $student->student_id)}}">
                </div>  
                    @error('student_id')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror

                                <div class="form-group">
                    <label for="faculty">Faculty</label>
                    <input type="text" name="faculty" id="faculty" class="form-control" value="{{old('faculty', $student->faculty)}}">

                    @error('faculty')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="departments">Departments</label>
                    <input type="text" name="departments" id="departments" class="form-control" value="{{old('departments', $student->departments)}}">

                    @error('departments')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="enrollment_year">Enrollment Year</label>
                    <input type="" name="enrollment_year" id="enrollment_year" class="form-control" value="{{ old('enrollment_year', $student->enrollment_year)}}">
                </div>

                 @error('enrollment_year')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                 @enderror

                <div class="form-group">
                    <label for="current_semester">Semester</label>
                    <input type="" name="current_semester" id="current_semester" class="form-control" value="{{ old('current_semester', $student->current_semester)}}">
                </div>

                @error('current_semester')
                    <div class="alert alert-danger">
                      {{$message}}
                    </div>
                @enderror

                <div class="form-group">
                    <label for="current_year">Academic Year</label>
                    <input type="" name="current_year" id="current_year" class="form-control" value="{{ old('current_year', $student->current_year)}}">
                </div>

                @error('current_year')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
              <button type="submit" class="btn btn-primary waves-effect waves-light"> Save</button>
              <a href="{{route('student.index')}}"  class="btn btn-primary waves-effect waves-light">Back</a>
        </form>         
    </div>
</div>
