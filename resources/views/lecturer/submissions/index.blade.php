@include('dashboard.header')

<div class="container">
    <h2 class="text-center mt-3"> Correction Studens's Answer - {{ $assignment->title }}</h2>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Correction State</th>
                    <th>Grade</th>
                    <th>Submissin Date</th>
                    <th>Procedures</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($submissions as $submission)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $submission->student->name }}</td>
                    <td>
                        @if($submission->graded_at)
                            <span class="badge bg-success">Corrected</span>
                        @else
                            <span class="badge bg-warning">Awaiting Correction </span>
                        @endif
                    </td>
                    <td>{{ $submission->grade ?? '--' }}</td>
                    <td>{{ $submission->created_at }}</td>
                    {{-- ->format('Y-m-d H:i') --}}
                    <td>
                        <a href="{{ route('submissions.show', $submission) }}" class="btn btn-sm btn-primary">
                            Show More 
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
