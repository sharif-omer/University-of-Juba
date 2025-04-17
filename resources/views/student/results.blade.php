@include('dashboard.header')
<div class="container">
    <h3 class="text-center my-4">Student Results: <span class="text-primary">{{Auth::user()->name}}</span></h3>
    <div class="table-responsive">
        @if($hasResults)
    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>#</th>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Credit Hours</th>
                <th>Semester</th>
                <th>Grate</th>
            </tr>
        </thead>
        <tbody>
            @php($i = 1)
            
            @foreach ($student->results as $result)
            <tr class="text-center">
                <td>{{$i++}}</td>
                <td>{{$result->course->name}}</td>
                <td>{{$result->course->course_code}}</td>
                <td>{{$result->course->credit_hours}}</td>
                <td>{{$result->semester}}</td>
                <td>
                    @if($result->grade == 'A')
                        <span class="badge bg-success">{{ $result->grade }}</span>
                    @elseif($result->grade == 'B+')
                        <span class="badge bg-primary">{{ $result->grade }}</span>
                    @elseif($result->grade == 'B')
                        <span class="badge bg-primary">{{ $result->grade }}</span>
                    @elseif($result->grade == 'C+')
                        <span class="badge bg-info">{{ $result->grade }}</span>
                    @elseif($result->grade == 'C')
                        <span class="badge bg-warning">{{ $result->grade }}</span>
                    @elseif($result->grade == 'D+')
                        <span class="badge bg-danger">{{ $result->grade }}</span>
                    @elseif($result->grade == 'D')
                        <span class="badge bg-secondary">{{ $result->grade }}</span>
                    @elseif($result->grade == 'F')
                        <span class="badge bg-dark">{{ $result->grade }}</span>
                    @else
                        <span class="badge bg-light text-dark">{{ $result->grade }}</span>
                    @endif
                </td>
            </tr>       
            @endforeach  
          
        </tbody>
    </table>
   
</div>
<hr>
<div class="row mt-4">
    <!-- First Semster GPA -->
    <div class="col-md-4 mb-4">
      <div class="card text-white bg-success">
         <div class="card-header text-center">
           <h5  class="card-title mb-0"> First Semester GPA</h5>
         </div>
         <div class="card-body text-center">
            <p class="card-text h4 mt-1 text-light">{{number_format($semester1GPA, 2)}}</p>
         </div>
      </div>
    </div>
        <!-- Second Semster GPA -->
    <div class="col-md-4 mb-4">
      <div class="card text-white bg-primary">
         <div class="card-header text-center">
           <h5  class="card-title mb-0 "> Second Semester GPA</h5>
         </div>
         <div class="card-body text-center">
            <p class="card-text h4 mt-1 text-light">{{number_format($semester2GPA, 2)}}</p>
         </div>
      </div>
    </div>
        <!-- cumulative GPA -->
    <div class="col-md-4 mb-4">
      <div class="card text-white bg-info">
         <div class="card-header text-center">
           <h5  class="card-title mb-0"> Cumulative GPA</h5>
         </div>
         <div class="card-body text-center">
            <p class="card-text h4 mt-1 text-light">{{number_format($cumulativeGPA, 2)}}</p>
         </div>
      </div>
    </div>
</div>
@else
<div class="alert alert-info text-center">You Do Not Have a Result Now</div>
@endif
        <a class="btn btn-primary waves-effect waves-light" href="{{route('student')}}">Back</a>
</div>
