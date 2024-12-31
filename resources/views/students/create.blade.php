@include('dashboard.header')
        <div class="card-header">
            <h2 class="card-title text-center">Create Students</h2>
        </div>

<div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('student.store')}}">
            @csrf
                <div class="form-group">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>

                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" name="student_id" id="student_id" class="form-control" required>
                </div> 

                <div class="form-group">
                    <label for="faculty">Faculty</label>
                    <input type="text" name="faculty" id="faculty" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="enrollment_year">Enrollment year</label>
                    <input type="text" name="enrollment_year" id="enrollment_year" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" name="semester" id="semester" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="year">Academic Year</label>
                    <input type="text" name="year" id="year" class="form-control" required>
                </div>
              
              <div class="text-center">
                <button type="submit" class="btn btn-primary waves-effect waves-light"> Save</button>
                <a href="{{route('student.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
            </div>
        </form>           
    </div>
</div>

