
@include('dashboard.header')
<x-app-layout>
<div class="container mt-4">
    <h3>Submit Assignment</h3>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('student.submitAssignment') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" name="course" id="course" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="file">Upload Assignment</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light mt-3">Back</a>
        </div>
    </form>
</div>
</div>
</x-app-layout>

