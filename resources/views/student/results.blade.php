
<x-app-layout>
    @include('dashboard.header')

<div class="container mt-4">
    <h3>Your Results</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Course</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $result['course'] }}</td>
                <td>{{ $result['grade'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
</div>
</x-app-layout>

{{-- @endsection --}}
