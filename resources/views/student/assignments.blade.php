
@include('dashboard.header')
<div class="container">

 <h2 class="text-center my-4">My Assignment</h2>

 {{-- @if($assignments->isNotEmpty()) --}}
@foreach($assignments as $assignment)
    <h3>{{$assignment->title}}</h3>
    <p>{{ $assignment->description}}</p>
    <p> Deadline: {{ $assignment->deadline }}</p>

    {{-- @if(!$assignment->pivot->answer) --}}
        <form action="{{ route('assignments.submit', $assignment->id) }}" method="POST">
            @csrf
            <textarea name="answer" required></textarea>
            <button type="submit">Send</button>
        </form>
    {{-- @else --}}
        <p>Answer: {{ $assignment->pivot->answer }}</p>
        <p>Grade: {{ $assignment->pivot->grade ?? 'لم يتم التصحيح بعد' }}</p>
    {{-- @endif --}}
@endforeach
{{-- @else --}}
 {{-- <p class="alert alert-light-info">You Do not Have an Assignment!</p> --}}
{{-- @endif --}}
    <div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light mt-3">Back</a>
    </div>
   @include('dashboard.footer')
    </form>
</div>

