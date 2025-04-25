@include('dashboard.header')

<div class="container">
    <h1 class="text-center">Your Assignment</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="list-group">
        @foreach($assignments as $assignment)
            <div class="list-group-item">
                <h4>{{ $assignment->title }}</h4>
                <p>{{ $assignment->description }}</p>
                <p> Deadline: {{ $assignment->deadline}}</p>
                {{-- ->format('Y-m-d H:i') --}}
                
                @if($assignment->submissions->isNotEmpty())
                    <span class="badge bg-success"> Submited</span>
                @else
                    <span class="badge bg-warning"> Not Submit </span>
                @endif
                
                <a href="{{ route('student.assignments.show', $assignment) }}" class="btn btn-primary mt-2">
                    {{ $assignment->submissions->isNotEmpty() ? 'Show Assignment' : ' Anwser' }}
                </a>
            </div>
           
        @endforeach
    </div>
    <a class="btn btn-primary mt-2" href="{{route('student')}}">Back</a>
</div>
