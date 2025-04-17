@include('dashboard.header')

<div class="container">
    <h3 class="mt-10 text-center">Add Result</h3>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif

   
    <form action="{{ route('lecturer.addResult') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_id">Student id</label>
            <input type="text" name="student_id" id="student_id" class="form-control" required>
        </div>

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
            <input type="integer" name="credit_hours" id="credit_hours" class="form-control" required>
        </div>

        
        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="integer" name="grade" id="grade" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Add Result</button>
        
            <a href="{{route('lecturer.results')}}" class="btn btn-primary mt-3">View Results</a>
            <a href="{{route('lecturer')}}" class="btn btn-info mt-3">Go Back</a>
        
    </form>
</div>
