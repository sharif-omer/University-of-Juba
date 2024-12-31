@include('dashboard.header')
<div class="container">
    <h3 class="mt-10 text-center">Assign Results</h3>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('lecturer.addResult') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" name="student_id" id="student_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="course_code">Course Code</label>
            <input type="text" name="course_code" id="course_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="text" name="grade" id="grade" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Result</button>
        <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light mt-3">Back</a>
    </form>
</div>
