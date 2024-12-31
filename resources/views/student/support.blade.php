    @include('dashboard.header')

<div class="container mt-4">
    <h3>Feedback / Support</h3>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('student.submitSupport') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Your Message</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            <a href="{{route('student')}}" class="text-center btn btn-primary waves-effect waves-light mt-3">Back</a>
        </div>
    </form>
</div>
