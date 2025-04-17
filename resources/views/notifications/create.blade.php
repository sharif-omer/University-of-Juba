@include('dashboard.header')

<!-- resources/views/notifications/create.blade.php -->

<div class="container">
    <h2>Send Notification</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('notifications.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Notification Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="message">Message Body</label>
            <textarea name="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
        </div>

        <div class="form-group">
            <label for="target">Send To</label>
            <select name="target" class="form-control" required>
                {{-- @if(auth()->user()->role == 0) --}}
                    <option value="students">Lecturers</option>
                    <option value="lecturers">Students</option>
                {{-- @elseif(auth()->user()->role == 1)
                    <option value="students">Students</option>
                @endif --}}
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Send</button>
    
        <a class="btn btn-primary mt-2" href="{{route('dashboard')}}">Back</a>
    </form>
</div>


{{-- ============= --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(auth()->user()->isAdmin())
                        إرسال إشعار لجميع الأساتذة
                    @elseif(auth()->user()->isLecturer())
                        إرسال إشعار لجميع الطلاب
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ auth()->user()->isAdmin() ? route('notifications.lecturers.store') : route('notifications.students.store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="message">Notifaction Prograph</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3" required></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Sent</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
