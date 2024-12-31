@include('dashboard.header')
<div class="container">
    <h3 class="mt-10 text-center">Upload Assignments</h3>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('lecturer.addAssignment') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="course_code">Course Code</label>
            <input type="text" name="course_code" id="course_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="assignment_file">Assignment File</label>
            <input type="file" name="assignment_file" id="assignment_file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Upload</button>
        <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light mt-3">Back</a>
    </form>
</div>