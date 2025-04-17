@include('dashboard.header')


<div class="container">
    <h2 class="text-center"> Student Name: {{ $submission->student->name }}</h2>
    <h4> Assignment Title: {{ $submission->assignment->title }}</h4>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5>Student's answer :</h5>
            <div class="p-3 bg-light rounded">
                {!! nl2br(e($submission->answers)) !!}
            </div>
            <p class="mt-2">
                <strong>Submission Date:</strong> 
                {{ $submission->created_at }}
                {{-- ->format('Y-m-d H:i') --}}
            </p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('submissions.grade', $submission) }}">
                @csrf
                <input type="hidden" name="	submission_id" value="{{$submission->id}}">
                <div class="mb-3">
                    <label for="grade" class="form-label">Grade (From 30)</label>
                    <input type="number" class="form-control" id="grade" name="grade" 
                           min="0" max="100" value="{{old('grade' , $submission->grade ?? '')}}" required>
                </div>

                @error('grade')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
               @enderror
                
                <div class="mb-3">
                    <label for="feedback" class="form-label"> Correction notes</label>
                    <textarea class="form-control" id="feedback" name="feedback" rows="3" value="{{old('feedback')}}">{{ $submission->feedback ?? '' }}</textarea>
                </div>

                @error('feedback')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
                
                <button type="submit" class="btn btn-primary">Save Correction </button>
                    <a class="btn btn-primary" href="{{route('assignment.index')}}">Back</a>

            </form>
        </div>
    </div>
</div>
