@include('dashboard.header')
        
            <h2 class="text-center">Update <span class="text-info">{{$calendar->title}}</span>  Information</h2>
        
<div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('calendar.update', $calendar->id)}}">
            @csrf
            @method('PUT')
            
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $calendar->title)}}">
                </div>
    
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $calendar->description)}}">
                </div> 

                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="date" name="start_time" id="start_time" class="form-control" value="{{ old('start_time', $calendar->start_time)}}">
                </div>

                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="date" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', $calendar->end_time)}}">
                </div>

                <div class="form-group">
                    <label for="event_type">Event Type</label>
                    <input type="text" name="event_type" id="event_type" class="form-control" value="{{ old('event_type', $calendar->event_type)}}">
                </div>

                <div class="form-group">
                    <label for="academic_year">academic year</label>
                    <input type="text" name="academic_year" id="academic_year" class="form-control" value="{{ old('academic_year', $calendar->academic_year)}}">
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" name="semester" id="semester" class="form-control" value="{{ old('semester', $calendar->semester)}}">
                </div>
              
              <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
              <a class="btn btn-primary waves-effect waves-light" href="{{route('calendar.index')}}">Back</a>
        </form>        
    </div>
</div>

