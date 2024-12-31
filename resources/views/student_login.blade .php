@include('dashboard.header')
        <div class="card-header">
            <h2 class="card-title text-center">Create Students</h2>
        </div>

<div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('student.store')}}">
            @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>   
                <div class="form-group">
                    <label for="enrollment_year">Enrollment year</label>
                    <input type="text" name="enrollment_year" id="enrollment_year" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="department_id">Department id</label>
                    <input type="" name="department_id" id="department_id" class="form-control" required>
                </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary waves-effect waves-light"> Save</button>
                <a href="{{route('student.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
            </div>
        </form>           
    </div>
</div>

