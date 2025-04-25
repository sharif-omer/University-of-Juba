@include('dashboard.header')
            <h2 class="card-title text-center">Create Students</h2>

        @if (session('success'))
            <div class="alert alert-success">
             {{session('success')}}
            </div>
        @endif

<div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 600px;">
        <form method="POST" action="{{route('student.store')}}">
            @csrf
                <div class="form-group">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" id="name" class="form-control" required value="{{ old('name')}}">

                    @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div> 

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{old('email')}}">
 
                    @error('email')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div> 

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required value="{{old('password')}}">

                    @error('password')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror    
                </div> 

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required value="{{old('password_confirmation')}}">

                    @error('password_confirmation')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div> 

                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" name="student_id" id="student_id" class="form-control" required  value="{{old('student_id')}}">

                    @error('student_id')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div> 

                <div class="form-group">
                    <label for="faculty">Faculty</label>
                    <input type="text" name="faculty" id="faculty" class="form-control" required value="{{old('faculty')}}">

                    @error('faculty')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="departments">Departments</label>
                    <input type="text" name="departments" id="departments" class="form-control" required value="{{old('departments')}}">

                    @error('departments')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="current_semester">Semester</label>
                    <input type="text" name="current_semester" id="current_semester" class="form-control" required value="{{old('current_semester')}}">

                    @error('current_semester')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="enrollment_year">Enrollment year</label>
                    <input type="year" name="enrollment_year" id="enrollment_year" class="form-control" required value="{{old('enrollment_year')}}">

                    @error('enrollment_year')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="current_year">Academic Year</label>
                    <input type="year" name="current_year" id="current_year" class="form-control" required  value="{{old('current_year')}}">

                    @error('current_year')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>
              
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                <a href="{{route('student.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
        </form>           
    </div>
</div>

