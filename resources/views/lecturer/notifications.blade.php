@include('dashboard.header')
<div class="container">
    <h3 class="mt-10 text-center">Send Notifications</h3>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('lecturer.addNotification') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Notification Message</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Send Notification</button>
        <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light mt-3">Back</a>
    </form>
</div>