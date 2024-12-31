@include('dashboard.header')
        <div class="card-header">
            <h2 class="card-title text-center">Create Calemdar</h2>
        </div>

<div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('calendar.store')}}">
            @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" required>
                </div> 

                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="date" name="start_time" id="start_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="date" name="end_time" id="end_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="event_type">Event Type</label>
                    <input type="text" name="event_type" id="event_type" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="academic_year">academic year</label>
                    <input type="text" name="academic_year" id="academic_year" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" name="semester" id="semester" class="form-control" required>
                </div>
              
              <div class="text-center">
                <button type="submit" class="btn btn-primary waves-effect waves-light"> Save</button>
                <a href="{{route('calendar.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
            </div>
        </form>           
    </div>
</div>



{{-- @include('dashboard.header')

<div class="card-header">
    <h2 class="card-title text-center">Create Calender</h2>
</div>
<div class="d-flex justify-content-center vh-100">
   <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('calendar.store')}}">
            @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" required>
                </div>   

                <div class="form-group">
                    <label for="event_type">Event Type</label>
                    <input type="text" name="event_type" id="event_type" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" name="semester" id="semester" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="date" name="start_time" id="start_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="date" name="end_time" id="end_time" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    <a href="{{route('calendar.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
                </div>
        </form>  
    </div>      
</div>
 --}}
