@include('dashboard.header')
@php
   use App\Models\Notification;
@endphp
<div class="container">
    <h1 class="text-center">Notifications Page</h1>   
    <div class="card mt-2">
        <div class="card-body">
            <table class="table" id="table1">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Target</th>
                        <th>Delete</th>
              
                    </tr>
                </thead>
                <tbody>
                        @php($i = 1)
                        @foreach ($notifications as $notification)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$notification->title}} </td>
                            <td>{{$notification->message}} </td>
                            <td>{{$notification->target}} </td>
                            {{-- <td> 
                                <form action="{{route('lecturer.edit', $Lecturer->id)}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary sm">
                                     <i class="fas fa-edit"></i> 
                                    </button>
                                 </form> 
                            </td> --}}
                            <td>
                                <form id="delete-form-{{$notification->id}}" action="{{route('notifications.destroy', $notification->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="confirmDelete('delete-form-{{$notification->id}}')" class="btn btn-danger">
                                     <i class="fas fa-trash-alt"></i> 
                                    </button>
                                 </form> 
                            </td>                                 
                        </tr>
                     
                        @endforeach   
                </table>
                <a href="{{route('notifications.create')}}" class="text-center btn btn-primary waves-effect waves-light">Sent Notification</a>
                <a href="{{route('dashboard')}}" class="text-center btn btn-primary waves-effect waves-light">Back</a>
            </div>
     </div>
</div>
    @include('dashboard.footer')  

