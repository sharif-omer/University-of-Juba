@include('dashboard.header')

<x-app-layout>
    <div class="container mt-4">
        <h3>Notifications</h3>
        <ul class="list-group">
            @foreach($notifications as $notification)
            <li class="list-group-item">{{ $notification }}</li>
            @endforeach
        </ul>
        <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light mt-3">Back</a>
    </div>
</x-app-layout>
