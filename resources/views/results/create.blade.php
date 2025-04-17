@include('dashboard.header')
<div class="container mt-2">

<form method="POST" action="{{ route('results.store') }}">
    @csrf
     <div class="form-group">
        <label for="student_id">Student Name:</label>
        <select name="student_id" class="form-control">
            @foreach($students as $student)
                <option value="{{ $student->id }}">
                    {{ $student->user->name }}
                     ({{ $student->student_id }})
                </option>
            @endforeach
        </select> 

             @error('student_id')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
    </div> 
  
     <div class="form-group">
        <label for="semester">Semester :</label>
        <select name="semester" class="form-control">
            <option value="first">One</option>
            <option value="second">Two</option>
        </select>

        @error('semester')
            <div class="alert alert-danger">
                {{$message}}
            </div>
       @enderror
    </div> 

    <div class="form-group">
        <label for="course_id">Course Name:</label>
        <select name="course_id" class="form-control">
            @foreach($course as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name}} ({{ $item->course_code}})
                </option>
            @endforeach
        </select>

            @error('course_id')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
    </div>

    <div class="form-group">
        <label for="marks">Marks</label>
        <input type="text" name="marks" id="marks" class="form-control" required value="{{ old('marks')}}">
        @error('marks')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror   
    </div>  
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{route('results.index')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>

</form>
</div>


