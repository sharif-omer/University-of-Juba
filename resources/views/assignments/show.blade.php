@include('dashboard.header')
<div class="container">
    <h1>{{ $assignment->title }}</h1>
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="text-info">Assignment Description:</h5>
            <p>{{ $assignment->description }}</p>
            <p><strong class="text-info">Final Deadline For Submission:</strong> {{ $assignment->deadline}}</p>
            {{-- ->format('Y-m-d H:i')  --}}
            <p>
                <strong class="text-info">
                    The Remaining Time: 
                </strong>
                @if(now() > $assignment->deadline)
                     Time is Up
                @else
                    {{ $assignment->deadline}}
                    {{-- ->diffForHumans() --}}
                @endif
                
            </p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('assignments.submit', $assignment) }}">
                @csrf
                
                <div class="mb-3">
                    <label for="answers" class="form-label">Your answer:</label>
                    <textarea class="form-control" id="answers" name="answers" rows="5" required
                        @if(now() > $assignment->deadline) disabled @endif
                    >{{ $submission->answers ?? '' }}</textarea>
                </div>
                
                @if(now() <= $assignment->deadline)
                    <button type="submit" class="btn btn-primary">
                        {{ $submission ? 'Update Answer' : 'Submit Answer' }}
                    </button>
                @else
                    <button type="button" class="btn btn-secondary" disabled>Answer Time is Up</button>
                @endif
                <a class="btn btn-primary" href="{{route('student.assignments')}}">Back</a>
            </form>
        </div>
    </div>

<div class="card mt-4">
    <div class="card-body">
        @if($submission && $submission->graded_at)
            <h5>Result:</h5>
            <p><strong>Grade:</strong> {{ $submission->grade }}/30</p>
            <p><strong>Lecturer Nots:</strong></p>
            <div class="p-3 bg-light rounded">
                {!! nl2br(e($submission->feedback)) !!}
            </div>
            <p class="text-muted mt-2">
                <small>Date Of Correction: {{ $submission->graded_at->format }}</small>
            </p>
        @elseif($submission)
            <p class="text-info">Answer is Submited, Waiting For Correction </p>
        @endif
    </div>
</div>


</div>
