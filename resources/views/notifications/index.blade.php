@include('dashboard.header')

<div class="container">
 <h2 class="text-center">Your Notifications</h2>
 @forelse ($notifications as $notification)
     <div class="alert alert-secondary">
        <h4>Notifications Title:</h4>
        <strong>{{$notification->title}}</strong><br>
        <h4>Notifications Message</h4>
        {{$notification->message}} <br>
        <small class="text-muted">
          {{$notification->created_at}}
        </small>
     </div>         
 @empty
 <div class="alert alert-info text-center">
  No Notifications Found.
 </div>
 @endforelse

 <a class="btn btn-primary" href="{{route('dashboard')}}">Back</a>
</div>

