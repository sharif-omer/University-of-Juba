@include('dashboard.header')
        <div class="card-header">
            <h2 class="card-title text-center">Create Courses</h2>
        </div>

<div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('course.store')}}">
            @csrf

            {{-- <div class="form-group">
                <label for="user_id">Student Name</label>
                <select name="user_id" class="form-control">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">
                            {{ $student->user->name }} 
                            ({{ $student->student_id }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div> --}}
                <div class="form-group">
                    <label for="name">Course Name</label>
                    <input type="text" name="name" class="form-control" id="name" required value="{{old('name')}}">

                    @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="course_code">Course Code</label>
                    <input type="text" name="course_code" id="course_code" class="form-control" required value="{{old('course_code')}}">

                    @error('course_code')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                   @enderror
                </div> 

                <div class="form-group">
                    <label for="credit_hours">Credit Hours</label>
                    <input type="text" name="credit_hours" id="credit_hours" class="form-control" required value="{{old('credit_hours')}}">

                    @error('credit_hours')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fuculty">Fuculty</label>
                    <input type="text" name="fuculty" id="fuculty" class="form-control" required value="{{('fuculty')}}">

                    @error('fuculty')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deparment">Deparment</label>
                    <input type="text" name="deparment" id="deparment" class="form-control" required value="{{old('deparment')}}">

                    @error('deparment')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                   @enderror
                </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary waves-effect waves-light"> Save</button>
                <a href="{{route('course.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
            </div>
        </form>           
    </div>
</div>

