@include('dashboard.header')
<x-app-layout>
<div class="container mt-4">
    <h2 class="text-dark">Result Of Semester One</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Credit Hours</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{$result->id}}</td>
                <td>{{$result->course_name}}</td>
                <td>{{$result->course_code}}</td>
                <td>{{$result->credit_hours}}</td>
                <td>{{$result->grade}}</td>
            </tr>
            @endforeach
            <tr class="bg-dark text-bg-light">
                <td>Semester GPA:</td>
                <td>Cumulative GPA:</td>
                <td>Academic Standing:</td>
            </tr>
        </tbody>
    </table>
    <a href="{{route('lecturer')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
    <a href="{{route('lecturer.addResult')}}" class="text-center btn btn-primary waves-effect waves-light"> Add Results</a>
</div>
</x-app-layout>